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

    }

    public function index(){
        $usuarios = $this->Usuarios->find()->contain(['Empresa'])->all();
        $this->set(compact('usuarios'));
    }

   
}
