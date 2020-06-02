<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class LoginController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();

        $this->set('Title', 'Multigraph');
        $this->viewBuilder()->setLayout('login');
        $this->loadModel('Usuarios');
    }

 

    public function index()
    {

        if ($this->request->is(['post'])) {
            $dados = $this->request->getData();
            $this->login($dados);
        }

    }

    public function login($user)
    {
        $login = $this->Usuarios->validaLogin($user);

        if(!$login['ok']){
            $this->Flash->error($login['message']);
        }else{
            $this->Auth->setUser($login['user']);
            return $this->redirect(['controller' => 'Clientes', 'action' => 'index', 'prefix' => 'Admin']);
        }

    }

    public function logout(){
        $this->request->getSession()->destroy();
        return $this->redirect($this->Auth->logout());
    }
}
