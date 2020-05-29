<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpresaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpresaTable Test Case
 */
class EmpresaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpresaTable
     */
    protected $Empresa;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Empresa',
        'app.Funcinario',
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
        $config = TableRegistry::getTableLocator()->exists('Empresa') ? [] : ['className' => EmpresaTable::class];
        $this->Empresa = TableRegistry::getTableLocator()->get('Empresa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Empresa);

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
