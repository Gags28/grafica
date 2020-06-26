<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP MyHtmlHelper
 * @author lucas
 */

namespace App\View\Helper;

use Cake\View\Helper\NumberHelper;
use App\View\Helper\MyHtmlHelper;

class MyNumberHelper extends NumberHelper {

    public function __construct(\Cake\View\View $View, array $config = array()) {
        parent::__construct($View, $config);
        $this->bHtml = new MyHtmlHelper($View, $config);
    }

    public function active($fieldName, array $options = []) {
        $fieldName = strtoupper((string) $fieldName);
        $d = [
            1 => [
                'text' => 'Ativo',
                'class' => 'success',
            ],
            9 => [
                'text' => 'Inativo',
                'class' => 'danger',
            ]
        ];
        return $this->bHtml->badge($d[$fieldName]['text'], $d[$fieldName]['class']);
    }

    public function pedidos($fieldName, array $options = []) {
        $fieldName = strtoupper((string) $fieldName);
        $d = [
            2 => [
                'text' => 'A Produzir',
                'class' => 'warning',
            ],
            3 => [
                'text' => 'Produzindo',
                'class' => 'info',
            ],
            4 => [
                'text' => 'Finalizado',
                'class' => 'success',
            ]
        ];
        return $this->bHtml->badge($d[$fieldName]['text'], $d[$fieldName]['class']);
    }


    public function urgencia($fieldName, array $options = []) {
        $fieldName = strtoupper((string) $fieldName);
        $d = [
            0 => [
                'text' => 'Normal',
                'class' => 'info',
            ],
            1 => [
                'text' => 'Urgente',
                'class' => 'danger',
            ]
        ];
        return $this->bHtml->badge($d[$fieldName]['text'], $d[$fieldName]['class']);
    }


    public function user($fieldName, array $options = []) {
        $fieldName = strtoupper((string) $fieldName);
        $d = [
            1 => [
                'text' => 'Administrador',
                'class' => 'purple',
            ],
            2 => [
                'text' => 'Comprador',
                'class' => 'teal',
            ],
            3 => [
                'text' => 'Solicitante',
                'class' => 'gray',
            ]
        ];
        return $this->bHtml->badge($d[$fieldName]['text'], $d[$fieldName]['class']);
    }

    public function foneCelular($val){

        if(strlen($val) == 11){
            $this->mask($val, '(##) #####-####');
        }else{
            $this->mask($val, '(##) ####-####');
        }
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
        
        echo $maskared;
    }

    public function documento($val, $mask = '')
    {
        $maskared = '';
        $k = 0; 

        if(strlen($val) == 11){
            $mask = "###.###.###-##";
        }elseif(strlen($val) == 14){
            $mask = "##.###.###/####-##";
        }

        for ($i = 0; $i <= strlen($mask) - 1; $i++) {

            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        
        echo $maskared;
    }
}    