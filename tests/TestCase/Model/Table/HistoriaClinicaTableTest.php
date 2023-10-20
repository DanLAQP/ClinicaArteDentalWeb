<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoriaClinicaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoriaClinicaTable Test Case
 */
class HistoriaClinicaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoriaClinicaTable
     */
    protected $HistoriaClinica;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.HistoriaClinica',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HistoriaClinica') ? [] : ['className' => HistoriaClinicaTable::class];
        $this->HistoriaClinica = $this->getTableLocator()->get('HistoriaClinica', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HistoriaClinica);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HistoriaClinicaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
