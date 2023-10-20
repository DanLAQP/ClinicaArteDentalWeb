<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoriaMedicaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoriaMedicaTable Test Case
 */
class HistoriaMedicaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoriaMedicaTable
     */
    protected $HistoriaMedica;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.HistoriaMedica',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HistoriaMedica') ? [] : ['className' => HistoriaMedicaTable::class];
        $this->HistoriaMedica = $this->getTableLocator()->get('HistoriaMedica', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HistoriaMedica);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HistoriaMedicaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
