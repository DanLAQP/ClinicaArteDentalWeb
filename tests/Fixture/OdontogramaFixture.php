<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OdontogramaFixture
 */
class OdontogramaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'odontograma';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'OdxCod' => 1,
                'HisCliCod' => 1,
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
