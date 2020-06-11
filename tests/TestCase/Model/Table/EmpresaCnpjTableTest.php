<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpresaCnpjTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpresaCnpjTable Test Case
 */
class EmpresaCnpjTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpresaCnpjTable
     */
    protected $EmpresaCnpj;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EmpresaCnpj',
        'app.Empresas',
        'app.Usuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EmpresaCnpj') ? [] : ['className' => EmpresaCnpjTable::class];
        $this->EmpresaCnpj = TableRegistry::getTableLocator()->get('EmpresaCnpj', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EmpresaCnpj);

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
