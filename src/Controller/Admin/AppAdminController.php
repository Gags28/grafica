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
        $this->viewBuilder()->setLayout('admin');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();

        if (!empty($user) && $user['status'] === $this->Usuarios->statusAtivo && $user['tipo'] == $this->Usuarios->tipoAdmin) {
            $this->Auth->allow();
        } else {
            $this->Auth->deny();
            return $this->redirect(['controller' => 'login', 'action' => 'index', 'prefix' => false]);
        }
    }
}
