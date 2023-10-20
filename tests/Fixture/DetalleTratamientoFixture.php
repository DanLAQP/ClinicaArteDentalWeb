<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleTratamientoFixture
 */
class DetalleTratamientoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'detalle_tratamiento';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'DetTraCod' => 1,
                'TraCod' => 1,
                'DetTraNum' => 1,
                'DetTraDes' => '',
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
