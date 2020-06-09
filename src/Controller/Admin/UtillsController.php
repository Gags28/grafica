<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

class UtillsController extends AppAdminController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Utills');
    }

    public function validaUsuarioEmail()
    {

        $result['isOk'] = false;
        $result['result'] = [];
        $result['code'] = 204;
        $result['message'] = 'E-mail inválido';

        if ($this->request->is(['post'])) {

            $data = $this->request->getData();
            
            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $usuario = $this->Utills->buscaUsuarioEmail($data['email']);
                if (empty($usuario)) {
                    $result['isOk'] = true;
                    $result['result'] = [];
                    $result['code'] = 202;
                    $result['message'] = 'E-mail disponível';
                } else {
                    $result['code'] = 203;
                    $result['message'] = 'E-mail já está sendo utilizado';
                }
            }
        }

        $this->sendResponse($result, $result['code']);
    }
}
