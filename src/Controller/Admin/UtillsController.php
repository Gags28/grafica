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

    public function validaCnpjEmpresa()
    {

        $result['isOk'] = false;
        $result['result'] = [];
        $result['code'] = 204;
        $result['message'] = 'CNPJ inválido';

        if ($this->request->is(['post'])) {

            $data = $this->request->getData();

            if ($this->validarCnpj($data['cnpj'])) {

                $usuario = $this->Utills->buscaEmpresaCNPJ($data);
                if (empty($usuario)) {
                    $result['isOk'] = true;
                    $result['result'] = [];
                    $result['code'] = 202;
                    $result['message'] = 'CNPJ disponível';
                } else {
                    $result['code'] = 203;
                    $result['message'] = 'CNPJ já está sendo utilizado';
                }

            }
        }

        $this->sendResponse($result, $result['code']);
    }


    public function validarCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
}
