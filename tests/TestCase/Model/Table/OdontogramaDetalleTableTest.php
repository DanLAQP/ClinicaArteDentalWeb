<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OdontogramaDetalleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OdontogramaDetalleTable Test Case
 */
class OdontogramaDetalleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OdontogramaDetalleTable
     */
    protected $OdontogramaDetalle;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.OdontogramaDetalle',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OdontogramaDetalle') ? [] : ['className' => OdontogramaDetalleTable::class];
        $this->OdontogramaDetalle = $this->getTableLocator()->get('OdontogramaDetalle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->OdontogramaDetalle);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OdontogramaDetalleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
