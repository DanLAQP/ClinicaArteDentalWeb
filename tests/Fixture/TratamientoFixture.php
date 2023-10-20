<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TratamientoFixture
 */
class TratamientoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tratamiento';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'TraCod' => 1,
                'HisCliCod' => 1,
                'TraCan' => 1,
                'TraCosUni' => 1,
                'TraCosTot' => 1,
                'EstReg' => '',
                'CarFlaAct' => '',
            ],
        ];
        parent::init();
    }
}
