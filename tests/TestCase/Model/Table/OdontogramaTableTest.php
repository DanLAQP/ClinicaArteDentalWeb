<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OdontogramaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OdontogramaTable Test Case
 */
class OdontogramaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OdontogramaTable
     */
    protected $Odontograma;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Odontograma',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Odontograma') ? [] : ['className' => OdontogramaTable::class];
        $this->Odontograma = $this->getTableLocator()->get('Odontograma', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Odontograma);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OdontogramaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
