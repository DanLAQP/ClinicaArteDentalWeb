<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistorialTrabajoFixture
 */
class HistorialTrabajoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'historial_trabajo';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'HisTraCod' => 1,
                'HisCliCod' => 1,
                'HisTraFecAno' => 1,
                'HisTraFecMes' => 1,
                'HisTraFecDia' => 1,
                'HisTraLab' => 1,
                'HisTraDocNom' => '',
                'HisTraTra' => '',
                'HisTraAcu' => 1,
                'HisTraSal' => 1,
                'HisTraFirPac' => 1,
                'HisTraObs' => '',
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
