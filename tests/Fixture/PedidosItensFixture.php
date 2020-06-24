<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidosItensFixture
 */
class PedidosItensFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cartao_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantidade' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pedido_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'cartao_id_campos_idx' => ['type' => 'index', 'columns' => ['cartao_id'], 'length' => []],
            'pedido_id_pedidos_itens_idx' => ['type' => 'index', 'columns' => ['pedido_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cartao_id_pedidos_itens' => ['type' => 'foreign', 'columns' => ['cartao_id'], 'references' => ['cartoes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pedido_id_pedidos_itens' => ['type' => 'foreign', 'columns' => ['pedido_id'], 'references' => ['pedidos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
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
                'cartao_id' => 1,
                'quantidade' => 1,
                'pedido_id' => 1,
            ],
        ];
        parent::init();
    }
}
