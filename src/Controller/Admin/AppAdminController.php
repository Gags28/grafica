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

    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        $user = $this->Auth->user();

        if(!empty($user) && $user['tipo'] === $this->Usuarios->tipoAdmin && $user['status'] === $this->Usuarios->statusAtivo){
            $this->Auth->allow();
        }else{
            $this->Auth->deny();
            return $this->redirect(['controller' => 'login', 'action' => 'index', 'prefix' => false]);
        }
    }
}
