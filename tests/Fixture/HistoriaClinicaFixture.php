<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistoriaClinicaFixture
 */
class HistoriaClinicaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'historia_clinica';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'HisCliCod' => 1,
                'OdoCod' => 1,
                'HisMedCod' => 1,
                'HisCliOdoAce' => 1,
                'HisCliPacAce' => 1,
                'HisCliAno' => 1,
                'HisCliMes' => 1,
                'HisCliDia' => 1,
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
