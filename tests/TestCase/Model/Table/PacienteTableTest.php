<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PacienteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PacienteTable Test Case
 */
class PacienteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PacienteTable
     */
    protected $Paciente;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Paciente',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Paciente') ? [] : ['className' => PacienteTable::class];
        $this->Paciente = $this->getTableLocator()->get('Paciente', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Paciente);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PacienteTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
