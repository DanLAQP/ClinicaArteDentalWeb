<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleTratamiento Entity
 *
 * @property int $DetTraCod
 * @property int $TraCod
 * @property int $DetTraNum
 * @property string|null $DetTraDes
 * @property string|null $EstReg
 * @property string|null $CarFlaAct
 */
class DetalleTratamiento extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'TraCod' => true,
        'DetTraCan' => true,
        'DetTraCosUni' => true,
        'DetTraCosTot' => true,
        'DetTraEst' => true,
        'DetTraDes' => true,
        'EstReg' => true,
        'CarFlaAct' => true,
    ];
}
