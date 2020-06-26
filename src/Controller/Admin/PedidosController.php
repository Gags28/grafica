<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

class PedidosController extends AppAdminController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Pedidos');
        $this->loadModel('PedidosItens');
        $this->loadModel('Funcionarios');
        $this->loadModel('Usuarios');
    }

    public function index()
    {
        $pedidos_aberto = $this->Pedidos->find()
            ->contain(['EmpresaCnpj' => ['Empresas'], 'Usuarios'])
            ->where(['Pedidos.status' => $this->Pedidos->statusAProduzir])->toArray();

        $pedidos_produzindo = $this->Pedidos->find()
            ->contain(['EmpresaCnpj' => ['Empresas'], 'Usuarios'])
            ->where(['Pedidos.status' => $this->Pedidos->statusProduzindo])->toArray();

        $pedidos_finalizados = $this->Pedidos->find()
            ->contain(['EmpresaCnpj' => ['Empresas'], 'Usuarios'])
            ->where(['Pedidos.status' => $this->Pedidos->stutusFinalizado]);

        $pedidos_finalizados = $this->paginate($pedidos_finalizados);


        $pedidos_aberto  = $this->Pedidos->enderecoEntrega($pedidos_aberto);
        $pedidos_produzindo = $this->Pedidos->enderecoEntrega($pedidos_produzindo);

        $this->set(compact('pedidos_aberto', 'pedidos_produzindo', 'pedidos_finalizados'));
        $this->set('title', 'Pedidos');
    }

    public function getPedido()
    {

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $query = $this->Pedidos->find()
                ->contain(['EmpresaCnpj' => ['Empresas'], 'Usuarios'])
                ->where([
                    'Pedidos.id' => $data['id']
                ])->toArray();

            $pedido = $this->Pedidos->enderecoEntrega($query);

            foreach($pedido as $key => $p){

                $pedido[$key]['item'] = $this->PedidosItens->find()
                ->contain(['Pedidos' => ['EmpresaCnpj'], 'Cartoes'])
                ->where([
                    'pedido_id' => $p->id
                ])
                ->toArray();
            }
           
            $this->sendResponse($pedido, 200);
        }
    }

    public function cartao($id){
        $this->viewBuilder()->setLayout('card');

    }
}
