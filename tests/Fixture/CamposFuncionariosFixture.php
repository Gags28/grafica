<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CamposFuncionariosFixture
 */
class CamposFuncionariosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_funcionario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_campo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_funcionario_idx' => ['type' => 'index', 'columns' => ['id_funcionario'], 'length' => []],
            'id_campo_idx' => ['type' => 'index', 'columns' => ['id_campo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_campo' => ['type' => 'foreign', 'columns' => ['id_campo'], 'references' => ['campos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'id_funcionario_campos' => ['type' => 'foreign', 'columns' => ['id_funcionario'], 'references' => ['funcinario', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'id_funcionario' => 1,
                'id_campo' => 1,
            ],
        ];
        parent::init();
    }
}
