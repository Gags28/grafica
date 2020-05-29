<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidosTable Test Case
 */
class PedidosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidosTable
     */
    protected $Pedidos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pedidos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pedidos') ? [] : ['className' => PedidosTable::class];
        $this->Pedidos = TableRegistry::getTableLocator()->get('Pedidos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pedidos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
