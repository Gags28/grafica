<?php

declare(strict_types=1);

namespace App\Controller\Empresa;

use App\Controller\Empresa\AppEmpresaController;

class PedidosController extends AppEmpresaController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Pedidos');
        $this->loadModel('PedidosItens');
        $this->loadModel('Cartoes');
        $this->loadModel('Funcionarios');
    }


    public function index()
    {
        $this->loadModel('EmpresaCnpj');

        $pedidos = $this->PedidosItens->find()
        ->contain(['Pedidos' => ['EmpresaCnpj'], 'Cartoes'])
        ->toArray();

        $paginate =$this->PedidosItens->find()
        ->contain(['Pedidos' => ['EmpresaCnpj'], 'Cartoes']);

        foreach($pedidos as $key => $pedido){
            $query = $this->EmpresaCnpj->find()
            ->where([
                'id' => $pedidos[$key]->pedido->id_entrega
            ])->first();

            if(empty($query)){
                $pedidos[$key]->entrega = 'Retirar na Gráfica - '. $this->Pedidos->enderecoGrafica;
            }else{
                $pedidos[$key]->entrega = $query->rua . ', ' . $query->numero . ', ' . $query->rua . ', ' . ((isset($query->complemento)) ? $query->complemento . ', ' : ' ') . $query->bairro . ', ' . $query->cidade . ' - ' . $query->estado;

            }
        }
        
        $paginate = $this->paginate($paginate);

        $this->set(compact('pedidos', 'paginate'));
        $this->set('title', 'Pedidos');
    }

    public function add()
    {

        $cartao = $this->Cartoes->find()->all();
        $this->set(compact('cartao'));
    }

    public function dadosDoCartao($id =  null)
    {
        if ($id == null) {
            $this->Flash->error('Nenhum cartão selecionado');
            return $this->redirect(['action' => 'add']);
        }

        $user = $this->Auth->user();

        $cartao = $this->Cartoes->find()->where(['id' => $id])->first();

        if (empty($cartao)) {
            $this->Flash->error('Cartão não encontrado');
            return $this->redirect(['action' => 'add']);
        }

        $funcionarios = $this->Funcionarios->find('list', ['keyField' => 'nome', 'valueField' => 'nome'])
            ->where(['empresa_id' => $user['empresa_id']])
            ->order(['nome' => 'DESC']);

        $campos = explode(',', $cartao->campos);

        $this->set(compact('cartao', 'campos', 'funcionarios', 'id'));
    }

    public function getFuncionario()
    {
        if ($this->request->is(['post'])) {
            $data = $this->request->getData();

            $funcionario = $this->Funcionarios->find()
                ->where(['nome' => $data['id']])->first();

            if (!empty($funcionario)) {
                $this->sendResponse(['message' => 'Funcionário encontrado', 'data' => $funcionario], 200);
            } else {
                $this->sendResponse(['message' => 'Funcionário não encontrado', 'data' => $funcionario], 202);
            }
        }
    }

    public function addCarrinho($id = null)
    {
        $dados = $this->request->getData();
        $user = $this->Auth->user();
        $dados['nome'] = (isset($dados['nome-completo'])) ? $dados['nome-completo'] : $dados['nome'];

        $if_exist_funcionario = $this->Funcionarios->find()
            ->where([
                'nome' => $dados['nome'],
                'empresa_id' => $user['empresa_id']
            ])->first();


        if (empty($if_exist_funcionario)) {
            $dados['empresa_id'] = $user['empresa_id'];
            $this->Funcionarios->addNovo($dados);
        }

        if (isset($dados['nome']) && $dados['nome-completo']) {
            unset($dados['nome']);
        }

        $campos = [];
        $i = 0;
        $cartao = [];
        $cartao['id'] = $id;

        foreach ($dados as $key => $val) {
            if ($key == 'quantidade') {
                $cartao['quantidade'] = $val;
            } else {
                $campos[$i]['nome'] = $key;
                $campos[$i]['valor'] = $val;
                $campos[$i]['id_cartao'] = $id;
                $i++;
            }
        }

        $cartao['campos'] = $campos;

        $this->addItem($cartao);

        return $this->redirect(['action' => 'conferir']);
    }

    public function addItem($cartao)
    {

        $pedidos = $this->request->getSession()->read('Carrinho.pedidos');

        if (!isset($pedidos)) {
            $this->request->getSession()->write('Carrinho.pedidos', 0);
        }

        $pedidos = $this->request->getSession()->read('Carrinho.pedidos');
        $cartoes = $this->request->getSession()->read('Carrinho.cartoes');
        $pedidos++;
        $cartoes[$pedidos] = $cartao;
        $this->request->getSession()->write('Carrinho.cartoes', $cartoes);
        $this->request->getSession()->write('Carrinho.pedidos', $pedidos);
    }

    public function conferir()
    {
        $pedido =  $this->request->getSession()->read('Carrinho.pedidos');
        $produtos =  $this->request->getSession()->read('Carrinho.cartoes');

        $cartao = $this->Cartoes->find()->where(['id' => $produtos[$pedido]['id']])->first();

        $produto = $produtos[$pedido];

        $this->set(compact('cartao', 'produto', 'produtos'));
    }

    public function carrinho()
    {
        $this->loadModel('EmpresaCnpj');

        $user = $this->Auth->user();

        $produtos =  $this->request->getSession()->read('Carrinho.cartoes');

        $unidades = $this->EmpresaCnpj->find()->contain(['Empresas'])
        ->where([
            'empresa_id' => $user['empresa_id'],
            'EmpresaCnpj.status' => $this->EmpresaCnpj->statusAtivo
        ])
        ->order(['EmpresaCnpj.id' => 'asc'])->all();

        $enderecoGrafica = $this->Pedidos->enderecoGrafica;

        $this->set(compact('produtos', 'unidades', 'enderecoGrafica'));
    }

    public function fecharCarrinho(){

        if($this->request->is('post')){

            $user = $this->Auth->user();
            $data = $this->request->getData();
            $carrinho =  $this->request->getSession()->read('Carrinho.cartoes');

            if(!isset($data['faturamento'])){
                $this->Flash->error('Selecione o faturamento antes de enviar o pedido');
                return $this->redirect(['action' => 'carrinho']);
            }

            if(!isset($data['entrega'])){
                $this->Flash->error('Selecione a entrega antes de enviar o pedido');
                return $this->redirect(['action' => 'carrinho']);
            }
            
            $pedido = [];
            $pedido['id_usuario'] = $user['id'];
            $pedido['id_faturamento'] = $data['faturamento'];
            $pedido['id_entrega'] = $data['entrega'];
            $pedido['data'] = date('Y-m-d H:i:s');
            $pedido['status'] = $this->Pedidos->statusAProduzir;

            $save = $this->Pedidos->newEmptyEntity();
            $save = $this->Pedidos->patchEntity($save, $pedido);

            if($this->Pedidos->save($save)){

                $pedido_itens = [];        
                $pedido_itens['pedido_id'] = $save->id;
        
                foreach($carrinho as $item){
                    $pedido_itens['cartao_id'] = $item['id'];
                    $pedido_itens['quantidade']  = $item['quantidade'];

                    $save_item = $this->PedidosItens->newEmptyEntity();
                    $save_item = $this->PedidosItens->patchEntity($save_item, $pedido_itens);

                    $this->PedidosItens->save($save_item);
                }

                $this->request->getSession()->destroy();
                $this->request->getSession()->write('Auth.User', $user);

                $this->Flash->success('Seu pedido foi enviado');
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error('Não foi possível salvar o pedido');
                return $this->redirect(['action' => 'carrinho']);
            }
        }
      
    }

    public function remover($id)
    {
        $produtos =  $this->request->getSession()->read('Carrinho.cartoes');
        unset($produtos[$id]);
        $this->request->getSession()->write('Carrinho.cartoes', $produtos);

        return $this->redirect(['action' => 'carrinho']);
    }
}
