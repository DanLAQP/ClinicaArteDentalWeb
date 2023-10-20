<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OdontologoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OdontologoTable Test Case
 */
class OdontologoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OdontologoTable
     */
    protected $Odontologo;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Odontologo',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Odontologo') ? [] : ['className' => OdontologoTable::class];
        $this->Odontologo = $this->getTableLocator()->get('Odontologo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Odontologo);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OdontologoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
