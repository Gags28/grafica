<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidosItensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidosItensTable Test Case
 */
class PedidosItensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidosItensTable
     */
    protected $PedidosItens;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PedidosItens',
        'app.Funcionarios',
        'app.Cartaos',
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
        $config = TableRegistry::getTableLocator()->exists('PedidosItens') ? [] : ['className' => PedidosItensTable::class];
        $this->PedidosItens = TableRegistry::getTableLocator()->get('PedidosItens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PedidosItens);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
