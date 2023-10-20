<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TratamientoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TratamientoTable Test Case
 */
class TratamientoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TratamientoTable
     */
    protected $Tratamiento;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tratamiento',
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
        $config = $this->getTableLocator()->exists('Tratamiento') ? [] : ['className' => TratamientoTable::class];
        $this->Tratamiento = $this->getTableLocator()->get('Tratamiento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tratamiento);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TratamientoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
