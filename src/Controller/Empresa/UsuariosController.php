<?php

declare(strict_types=1);

namespace App\Controller\Empresa;

use App\Controller\Empresa\AppEmpresaController;

class UsuariosController extends AppEmpresaController
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
        $user = $this->Auth->user();

        $query = $this->Usuarios->find()->contain(['EmpresaCnpj' => ['Empresas']])
            ->where(['empresa_id' => $user['empresa_id']])
            ->order(['Usuarios.id' => 'asc']);

        $empresa_id = $this->EmpresaCnpj->find()->where(['EmpresaCnpj.id' => $user['empresa_id']])->first();

        $usuarios = $this->paginate($query);

        $this->set(compact('usuarios', 'empresa_id'));
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
            $user = $this->Auth->user();

            $query = $this->Usuarios->find()
                ->select([
                    'Usuarios.id',
                    'Usuarios.nome',
                    'Usuarios.email',
                    'Usuarios.status',
                    'Usuarios.limite_pedidos',
                    'Usuarios.telefone',
                    'Usuarios.tipo',
                    'EmpresaCnpj.id',
                ])
                ->contain(['EmpresaCnpj'])
                ->where([
                    'Usuarios.id' => $data['id'],
                    'Usuarios.empresa_cnpj_id' => $user['empresa_id']
                ])->first();

            $this->sendResponse($query, 200);
        }
    }
}
