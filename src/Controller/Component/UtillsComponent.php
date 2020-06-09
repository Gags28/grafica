<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

//require("vendor/autoload.php");

class UtillsComponent extends Component
{


    public function buscaUsuarioEmail($email)
    {
        $usuariosTable = \Cake\ORM\TableRegistry::getTableLocator()->get('Usuarios');

        $usuario = $usuariosTable->find()
            ->where([
                'email' => $email,
                'status' => $usuariosTable->statusAtivo
            ])->first();

        return $usuario;
    }
}
