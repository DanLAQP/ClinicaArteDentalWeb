<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OdontogramaDetalleFixture
 */
class OdontogramaDetalleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'odontograma_detalle';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'OdxDetCod' => 1,
                'OdxCod' => 1,
                'OdxDetNum' => 1,
                'OdxDetNumDie' => 1,
                'OdxDetVes' => 1,
                'OdxDetPal' => 1,
                'OdxDetLin' => 1,
                'OdxDetDer' => 1,
                'OdxDetIzq' => 1,
                'OdxDetDes' => '',
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
