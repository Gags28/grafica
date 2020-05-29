<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
class AppAdminController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Usuarios');
    }
    public function isAuthorized($user) {
        
        if(!empty($user) && $user['tipo'] === $this->Usuarios->tipoAdmin && $user['status'] === $this->Usuarios->statusAtivo){
            return true;
        }
    }
}
