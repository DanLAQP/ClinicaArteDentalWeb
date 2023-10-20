<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PacienteFixture
 */
class PacienteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'paciente';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'PacCod' => 1,
                'HisCliCod' => 1,
                'PacDir' => '',
                'PacAnoNac' => 1,
                'PacCel' => 1,
                'PacEma' => '',
                'PacDni' => 1,
                'PacNom' => '',
                'PacOcu' => '',
                'PacRef' => '',
                'PacEstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
