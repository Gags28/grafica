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

use Cake\Controller\Controller;
use Cake\View\Helper;
use Cake\View\View;

/**

 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */



    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Login',
                'action' => 'index',
                'prefix' => false,
                'plugin' => null
            ],
            'loginAction' => [
                'controller' => 'Login',
                'action' => 'index',
                'prefix' => false,
                'plugin' => null
            ],
            'logoutRedirect' => [
                'controller' => 'Login',
                'action' => 'index',
                'prefix' => false,
                'plugin' => null
            ],
            'authError' => 'Você não possui autorização para acessar essa área',
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'passwordHasher' => [
                        'className' => 'Default',
                    ],
                    'fields' => ['username' => 'email', 'password' => 'senha'],
                    'userModel' => 'Usuarios',
                    'scope' => [
                        'Usuarios.status' => 1,
                    ],
                ],
            ],
            'storage' => 'Session'
        ]);
    }

    public function isAuthorized($user)
    {
        return true;
    }

    public function sendResponse($info, $code)
    {

        $message = isset($info['message']) ? $info['message'] : '';
        $data = isset($info['data']) ? $info['data'] : $info;

        return $this->set([
            'data' => $data,
            'code' => $code,
            'message' => $message,
            '_serialize' => ['code', 'data', 'message']
        ]);
    }

    public function mask($val, $mask)
    {

        $maskared = '';
        $k = 0; 
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {

            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

}
