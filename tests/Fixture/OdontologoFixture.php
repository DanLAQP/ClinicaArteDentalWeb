<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OdontologoFixture
 */
class OdontologoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'odontologo';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'OdoCod' => 1,
                'OdoNom' => '',
                'OdoFecIngAno' => 1,
                'OdoFecIngMes' => 1,
                'OdoFecIngDia' => 1,
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
