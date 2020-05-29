<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CamposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CamposTable Test Case
 */
class CamposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CamposTable
     */
    protected $Campos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Campos',
        'app.Cartoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Campos') ? [] : ['className' => CamposTable::class];
        $this->Campos = TableRegistry::getTableLocator()->get('Campos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Campos);

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
