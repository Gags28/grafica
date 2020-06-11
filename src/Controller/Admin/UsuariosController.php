<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

class UsuariosController extends AppAdminController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Usuarios');
        $this->loadModel('Empresas');
        $this->loadModel('EmpresaCnpj');
    }

    public function index()
    {

        $query = $this->Usuarios->find()->contain(['EmpresaCnpj' => ['Empresas']])->order(['Usuarios.id' => 'asc']);

        $emprsas_list = $this->EmpresaCnpj->find()
            ->select(['EmpresaCnpj.id', 'Empresas.nome', 'cnpj'])
            ->contain(['Empresas'])->all();

        $empresas = [];

        foreach ($emprsas_list as $a) {
            $empresas[$a->id] = $a->empresa->nome . ' -  CNPJ: ' . $this->mask($a->cnpj, '##.###.###/####-##');
        }

        $usuarios = $this->paginate($query);

        $this->set(compact('usuarios', 'empresas'));
    }

    public function add()
    {

        if ($this->request->is(['post', 'put'])) {

            $data = $this->request->getData();

            $data['status'] = $this->Usuarios->statusAtivo;

            $user = $this->Usuarios->newEmptyEntity();
            $user = $this->Usuarios->patchEntity($user, $data);

            if (!empty($user)) {
                if ($this->Usuarios->save($user)) {
                    $this->Flash->success('Usuário salvo');
                } else {
                    $this->Flash->error('Usuário não salvo');
                }
            } else {
                $this->Flash->error('Usuário não encontrado');
            }

            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit()
    {

        if ($this->request->is(['post', 'put'])) {

            $data = $this->request->getData();


            $user = $this->Usuarios->get($data['id']);
            unset($user->senha);
            $user = $this->Usuarios->patchEntity($user, $data);

            if (!empty($user)) {
                if ($this->Usuarios->save($user)) {
                    $this->Flash->success('Usuário atualizado');
                } else {
                    $this->Flash->error('Usuário não atualizado');
                }
            } else {
                $this->Flash->error('Usuário não encontrado');
            }

            return $this->redirect(['action' => 'index']);
        }
    }

    public function status($id)
    {
        $user = $this->Usuarios->get($id);

        ($user->status == $this->Usuarios->statusInativo) ? $user->status = $this->Usuarios->statusAtivo : $user->status = $this->Usuarios->statusInativo;

        if (!empty($user)) {
            if ($this->Usuarios->save($user)) {
                $this->Flash->success('Usuário atualizada');
            } else {
                $this->Flash->error('Usuário não atualizado');
            }
        } else {
            $this->Flash->error('Usuário não encontrado');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getUser()
    {
        if ($this->request->is(['post'])) {

            $data = $this->request->getData();

            $query = $this->Usuarios->find()
                ->select([
                    'Usuarios.id', 
                    'Usuarios.nome', 
                    'Usuarios.email' , 
                    'Usuarios.status', 
                    'Usuarios.limite_pedidos', 
                    'Usuarios.telefone', 
                    'Usuarios.tipo', 
                    'EmpresaCnpj.id',])
                ->contain(['EmpresaCnpj'])
                ->where(['Usuarios.id' => $data['id']])->first();

            $this->sendResponse($query, 200);
        }
    }
}
