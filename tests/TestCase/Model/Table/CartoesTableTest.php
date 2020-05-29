<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CartoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CartoesTable Test Case
 */
class CartoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CartoesTable
     */
    protected $Cartoes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Cartoes') ? [] : ['className' => CartoesTable::class];
        $this->Cartoes = TableRegistry::getTableLocator()->get('Cartoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Cartoes);

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
