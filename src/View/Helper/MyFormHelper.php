<?php

namespace App\View\Helper;

use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Utility\Hash;
use Cake\View\Helper\FormHelper as FormHelper;
use Cake\View\View;
use InvalidArgumentException;

/**
 * MyForm helper
 */
class MyFormHelper extends FormHelper
{

    /**
     * Set on `Form::create()` to tell if the type of alignment used (i.e. horizontal).
     *
     * @var string|null
     */
    protected $_align;

    /**
     * Set on `Form::create()` to tell grid type.
     *
     * @var array|null
     */
    protected $_grid;

    /**
     * The method to use when creating a control element for a form
     *
     * @var string
     */
    protected $_controlMethod = 'control';

    /**
     * Default Bootstrap string templates.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'idPrefix' => null,
        'errorClass' => 'form-error',
        'typeMap' => [
            'string' => 'text',
            'text' => 'textarea',
            'uuid' => 'string',
            'datetime' => 'datetime',
            'datetimefractional' => 'datetime',
            'timestamp' => 'datetime',
            'timestampfractional' => 'datetime',
            'date' => 'date',
            'time' => 'time',
            'year' => 'year',
            'boolean' => 'checkbox',
            'float' => 'number',
            'integer' => 'number',
            'tinyinteger' => 'number',
            'smallinteger' => 'number',
            'decimal' => 'number',
            'binary' => 'file',
        ],
        'templates' => [
            // Used for button elements in button().
            'button' => '<button{{attrs}}>{{text}}</button>',
            // Used for checkboxes in checkbox() and multiCheckbox().
            'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
            // Input group wrapper for checkboxes created via control().
            'checkboxFormGroup' => '{{label}}',
            // Wrapper container for checkboxes.
            'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
            // Error message wrapper elements.
            'error' => '<div class="error-message">{{content}}</div>',
            // Container for error items.
            'errorList' => '<ul>{{content}}</ul>',
            // Error item wrapper.
            'errorItem' => '<li>{{text}}</li>',
            // File input used by file().
            'file' => '<input type="file" name="{{name}}"{{attrs}}>',
            // Fieldset element used by allControls().
            'fieldset' => '<fieldset{{attrs}}>{{content}}</fieldset>',
            // Open tag used by create().
            'formStart' => '<form{{attrs}}>',
            // Close tag used by end().
            'formEnd' => '</form>',
            // General grouping container for control(). Defines input/label ordering.
            'formGroup' => '{{label}}{{input}}',
            // Wrapper content used to hide other content.
            'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
            // Generic input element.
            'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
            // Submit input element.
            'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
            // Container element used by control().
            'inputContainer' => '<div class="form-group input {{type}}{{required}}"> {{content}} </div>',
            // Container element used by control() when a field has an error.
            'inputContainerError' => '<div class="form-group input {{type}}{{required}} error">  <div class="input-group"> {{content}}{{error}} </div> </div>',
            // Label element when inputs are not nested inside the label.
            'label' => '<label{{attrs}}>{{text}}</label>',
            // Label element used for radio and multi-checkbox inputs.
            'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
            // Legends created by allControls()
            'legend' => '<legend>{{text}}</legend>',
            // Multi-Checkbox input set title element.
            'multicheckboxTitle' => '<legend>{{text}}</legend>',
            // Multi-Checkbox wrapping container.
            'multicheckboxWrapper' => '<fieldset{{attrs}}>{{content}}</fieldset>',
            // Option element used in select pickers.
            'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
            // Option group element used in select pickers.
            'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
            // Select element,
            'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
            // Multi-select element,
            'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
            // Radio input element,
            'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
            // Wrapping container for radio input/label,
            'radioWrapper' => '{{label}}',
            // Textarea input element,
            'textarea' => '<textarea name="{{name}}"{{attrs}}>{{value}}</textarea>',
            // GroupContain input element
            'inputGroupContainer' => '<div class="input-group">{{prepend}}{{content}}{{append}}</div>',
            // GroupAddon input element
            'inputGroupAddon' => '<div class="input-group-prepend {{class}}"> <span class="input-group-text"> {{content}} </span></div>',
            // Container for submit buttons.
            'submitContainer' => '<div class="submit">{{content}}</div>',
            // Confirm javascript template for postLink()
            'confirmJs' => '{{confirm}}',
            // selected class
            'selectedClass' => 'selected',
        ],
        // set HTML5 validation message to custom required/empty messages
        'autoSetCustomValidity' => true,
    ];


    public function control(string $fieldName, array $options = []): string
    {

        $default = [
            'class' => 'form-control'
        ];

        if (isset($options['class'])) {
            $options['class'] .= ' ' . $default['class'];
        }

        $controlMethod = $this->_controlMethod;
        $options = \Cake\Utility\Hash::merge($default, $options);

        $result = parent::$controlMethod($fieldName, $options);
        return $result;
    }

    public function button(string $fieldName, array $options = []): string
    {

        $default = [
            'class' => 'btn btn-primary btn-block',
            'type' => 'submit'
        ];

        $controlMethod = $this->_controlMethod;
        $options = \Cake\Utility\Hash::merge($default, $options);
        $result = parent::$controlMethod($fieldName, $options);
        return $result;
    }

    public function tipoUsuario($fieldName, array $options = [])
    {
        $default = [
            'empty' => 'Selecione uma opção',
            'options' => [
                1 => 'Admin',
                2 => 'Comprador',
                3 => 'Solicitante',
            ]
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->control($fieldName, $options);
    }

    public function tipoUsuarioEmpresa($fieldName, array $options = [])
    {
        $default = [
            'empty' => 'Selecione uma opção',
            'options' => [
                2 => 'Comprador',
                3 => 'Solicitante',
            ]
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->control($fieldName, $options);
    }


    public function quantidade($fieldName, array $options = [])
    {


        $default = [
            'empty' => 'Selecione uma opção',
            'options' => [
                200 => '200',
                500 => '500',
                1000 => '1000'
            ]

        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        return $this->control($fieldName, $options);
    }

    public function select2($fieldName, array $options = [])
    {
        $default = [
            'class' => 'select2_multiple',
            'value' => [],
            'tags' => 'false',
            'placeholder' => 'Selecione uma opção',
            'allowClear' => 'false'
        ];
        $options = \Cake\Utility\Hash::merge($default, $options);
        $data = [];

        if ($options['value'] != null) {
            foreach ($options['value'] as $key => $value) {
                $data[] = $value;
            }
        }

        // debug($data);exit;
        $options['value'] = $data;
        $this->Html->css('/plugins/select2/dist/css/select2.min.css', ['block' => 'css']);
        $this->Html->script('/plugins/select2/dist/js/select2.full.min.js', ['block' => 'script']);
        $this->Html->script('/plugins/select2/dist/js/i18n/pt-BR.js', ['block' => 'script']);
        $this->Html->scriptBlock('$(".select2_multiple").select2({
            language:"pt-BR", 
            placeholder: "' . $options['placeholder'] . '",
            tags: ' . $options['tags'] . ',
            allowClear:  ' . $options['allowClear'] . ',
            tokenSeparators: [",", "/"] });', ['block' => 'script']);

        return $this->control($fieldName, $options);
    }
}
