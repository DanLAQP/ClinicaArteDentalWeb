<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistorialTrabajoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistorialTrabajoTable Test Case
 */
class HistorialTrabajoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HistorialTrabajoTable
     */
    protected $HistorialTrabajo;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.HistorialTrabajo',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HistorialTrabajo') ? [] : ['className' => HistorialTrabajoTable::class];
        $this->HistorialTrabajo = $this->getTableLocator()->get('HistorialTrabajo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HistorialTrabajo);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HistorialTrabajoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
