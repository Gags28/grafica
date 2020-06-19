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
        'nome' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'valor' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'id_cartao' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_pedido' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_funcionario_idx' => ['type' => 'index', 'columns' => ['id_funcionario'], 'length' => []],
            'id_cartao_idx' => ['type' => 'index', 'columns' => ['id_cartao'], 'length' => []],
            'id_pedido_idx' => ['type' => 'index', 'columns' => ['id_pedido'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_cartao_campos' => ['type' => 'foreign', 'columns' => ['id_cartao'], 'references' => ['cartoes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'id_pedido_campos' => ['type' => 'foreign', 'columns' => ['id_pedido'], 'references' => ['pedidos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'valor' => 'Lorem ipsum dolor sit amet',
                'id_cartao' => 1,
                'id_pedido' => 1,
            ],
        ];
        parent::init();
    }
}
