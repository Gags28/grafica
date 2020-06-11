<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

class EmpresasController extends AppAdminController
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

        $query = $this->EmpresaCnpj->find()->contain(['Empresas'])->order(['EmpresaCnpj.id' => 'asc']);
        $emp = $this->Empresas->find()->order(['Empresas.id' => 'asc']);

        $empresas_list = $this->Empresas->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->where(['status' => $this->Empresas->statusAtivo])->order(['Empresas.id' => 'asc']);

        $unidades = $this->paginate($query);
        $empresas = $this->paginate($emp);

        $this->set(compact('empresas', 'unidades', 'empresas_list'));
    }

    public function add()
    {
        $dados = $this->request->getData();
        $dados['status'] = $this->Empresas->statusAtivo;

        $empresa = $this->Empresas->newEmptyEntity();
        $empresa = $this->Empresas->patchEntity($empresa, $dados);

        if ($this->Empresas->save($empresa)) {
            $this->Flash->success('Empresa salva');
        } else {
            $this->Flash->error('Empresa não salva');
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addUnidade()
    {
        $dados = $this->request->getData();
        $dados['status'] = $this->EmpresaCnpj->statusAtivo;

        $empresa = $this->EmpresaCnpj->newEmptyEntity();
        $empresa = $this->EmpresaCnpj->patchEntity($empresa, $dados);

        if ($this->EmpresaCnpj->save($empresa)) {
            $this->Flash->success('Unidade salva');
        } else {
            $this->Flash->error('Unidade não salva');
        }

        return $this->redirect(['action' => 'index']);

    }

    public function edit()
    {
        if ($this->request->is(['post', 'put'])) {

            $data = $this->request->getData();

            $empresa = $this->Empresas->get($data['id']);
            $empresa = $this->Empresas->patchEntity($empresa, $data);

            if (!empty($empresa)) {
                if ($this->Empresas->save($empresa)) {
                    $this->Flash->success('Empresa atualizada');
                } else {
                    $this->Flash->error('Empresa não atualizada');
                }
            } else {
                $this->Flash->error('Empresa não encontrado');
            }

            return $this->redirect(['action' => 'index']);
        }
    }

    public function editUnidade()
    {
        if ($this->request->is(['post', 'put'])) {

            $data = $this->request->getData();

            $empresa = $this->EmpresaCnpj->get($data['id']);
            $empresa = $this->EmpresaCnpj->patchEntity($empresa, $data);

            if (!empty($empresa)) {
                if ($this->EmpresaCnpj->save($empresa)) {
                    $this->Flash->success('Unidade atualizada');
                } else {
                    $this->Flash->error('Unidade não atualizada');
                }
            } else {
                $this->Flash->error('Unidade não encontrada');
            }

            return $this->redirect(['action' => 'index']);
        }
    }

    public function status($id)
    {
        $user = $this->Empresas->get($id);

        ($user->status == $this->Empresas->statusInativo) ? $user->status = $this->Empresas->statusAtivo : $user->status = $this->Empresas->statusInativo;

        if (!empty($user)) {
            if ($this->Empresas->save($user)) {
                $this->Flash->success('Empresa atualizado');
            } else {
                $this->Flash->error('Empresa não atualizado');
            }
        } else {
            $this->Flash->error('Empresa não encontrada');
        }

        return $this->redirect(['action' => 'index']);
    }


    public function statusUnidade($id)
    {
        $user = $this->EmpresaCnpj->get($id);

        ($user->status == $this->EmpresaCnpj->statusInativo) ? $user->status = $this->EmpresaCnpj->statusAtivo : $user->status = $this->EmpresaCnpj->statusInativo;

        if (!empty($user)) {
            if ($this->EmpresaCnpj->save($user)) {
                $this->Flash->success('Unidade atualizado');
            } else {
                $this->Flash->error('Unidade não atualizado');
            }
        } else {
            $this->Flash->error('Unidade não encontrada');
        }

        return $this->redirect(['action' => 'index']);
    }


    public function getEmpresa()
    {
        if ($this->request->is(['post'])) {

            $data = $this->request->getData();
            $query = $this->Empresas->find()
                ->where(['Empresas.id' => $data['id']])->first();

            $this->sendResponse($query, 200);
        }
    }

    
    public function getUnidade()
    {
        if ($this->request->is(['post'])) {

            $data = $this->request->getData();
            $query = $this->EmpresaCnpj->find()
                ->where(['EmpresaCnpj.id' => $data['id']])->first();

            $this->sendResponse($query, 200);
        }
    }
}
