<?php

declare(strict_types=1);

namespace App\Controller\Empresa;

use App\Controller\Empresa\AppEmpresaController;


class EmpresasController extends AppEmpresaController
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

        $query = $this->EmpresaCnpj->find()->contain(['Empresas'])
            ->where(['empresa_id' => $user['empresa_id']])
            ->order(['EmpresaCnpj.id' => 'asc']);

        $emp = $this->Empresas->find()
            ->where([
                'id' => $user['empresa_id'],
                'status' => $this->Empresas->statusAtivo
            ])
            ->order(['Empresas.id' => 'asc']);

        $empresas_list = $this->Empresas->find('list', ['keyField' => 'id', 'valueField' => 'nome'])
            ->where([
                'id' => $user['empresa_id'],
                'status' => $this->Empresas->statusAtivo
            ])->order(['Empresas.id' => 'asc']);

        $unidades = $this->paginate($query);
        $empresas = $this->paginate($emp);

        $this->set(compact('empresas', 'unidades', 'empresas_list'));
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

            $user = $this->Auth->user();
            $data = $this->request->getData();
            $data['id'] = $user['id'];

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


            $user = $this->Auth->user();
            $data = $this->request->getData();
            $data['id'] = $user['id'];

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

    public function statusUnidade($id)
    {
        $empresa = $this->EmpresaCnpj->get($id);

        ($empresa->status == $this->EmpresaCnpj->statusInativo) ? $empresa->status = $this->EmpresaCnpj->statusAtivo : $empresa->status = $this->EmpresaCnpj->statusInativo;

        if (!empty($empresa)) {
            if ($this->EmpresaCnpj->save($empresa)) {
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
