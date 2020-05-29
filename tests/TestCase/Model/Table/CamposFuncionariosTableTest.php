<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CamposFuncionariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CamposFuncionariosTable Test Case
 */
class CamposFuncionariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CamposFuncionariosTable
     */
    protected $CamposFuncionarios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CamposFuncionarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CamposFuncionarios') ? [] : ['className' => CamposFuncionariosTable::class];
        $this->CamposFuncionarios = TableRegistry::getTableLocator()->get('CamposFuncionarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CamposFuncionarios);

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
