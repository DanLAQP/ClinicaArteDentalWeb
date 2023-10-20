<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleTratamientoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleTratamientoTable Test Case
 */
class DetalleTratamientoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleTratamientoTable
     */
    protected $DetalleTratamiento;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.DetalleTratamiento',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DetalleTratamiento') ? [] : ['className' => DetalleTratamientoTable::class];
        $this->DetalleTratamiento = $this->getTableLocator()->get('DetalleTratamiento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DetalleTratamiento);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DetalleTratamientoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
