<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistoriaMedicaFixture
 */
class HistoriaMedicaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'historia_medica';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'HisMedCod' => 1,
                'HisMedProCar' => 1,
                'HisMedEnfRen' => 1,
                'HisMedDia' => 1,
                'HisMedHip' => 1,
                'HisMedEpi' => 1,
                'HisMedVIH' => 1,
                'HisMedHep' => 1,
                'HisMedPro' => 1,
                'HisMedAle' => 1,
                'HisMedProCoa' => 1,
                'HisMedTomMed' => 1,
                'HisMedEmb' => 1,
                'HisMedProTraDen' => 1,
                'HisMedHab' => 1,
                'HisMedEsp' => 1,
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
