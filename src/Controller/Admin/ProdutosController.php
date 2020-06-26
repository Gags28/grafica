<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppAdminController;

class ProdutosController extends AppAdminController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Cartoes');
    }

    public function index(){
        $cartao = $this->Cartoes->find()->all();
        $this->set(compact('cartao'));
    }
}