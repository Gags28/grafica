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

use Cake\View\Helper\HtmlHelper;

class MyHtmlHelper extends HtmlHelper {

    public function badge($text, $type = 'default', $options = []) {

        if (is_string($type)) {
            $options['type'] = $type;
        } else if (is_array($type)) {
            $options = $type;
        }

        unset($options['type']);
        $options = $this->addClass($options, 'badge badge-outline');
        $options = $this->addClass($options, 'badge-' . $type);

        return $this->tag('div', $text, $options);
    }
}