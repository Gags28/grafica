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

    public function buscaEmpresaCNPJ($dados)
    {
        $empresaTable = \Cake\ORM\TableRegistry::getTableLocator()->get('EmpresaCNPJ');

        $empresa = $empresaTable->find()
            ->where([
                'cnpj' => $dados['cnpj'],
                'status' => $empresaTable->statusAtivo
            ])->first();

        return $empresa;
    }
}
