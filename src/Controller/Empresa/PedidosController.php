<?php

declare(strict_types=1);

namespace App\Controller\Empresa;

use App\Controller\Empresa\AppEmpresaController;

class PedidosController extends AppEmpresaController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Cartoes');
        $this->loadModel('Funcionarios');
    }


    public function index()
    {
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

        $this->set(compact('cartao', 'campos', 'funcionarios'));
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

    public function addCarrinho()
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

        debug($dados);
        exit;
    }
}
