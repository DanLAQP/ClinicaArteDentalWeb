<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OdontogramaDetalle Entity
 *
 * @property int $OdxDetCod
 * @property int $OdxCod
 * @property int $OdxDetNum
 * @property int|null $OdxDetNumDie
 * @property bool|null $OdxDetVes
 * @property bool|null $OdxDetPal
 * @property bool|null $OdxDetLin
 * @property bool|null $OdxDetDer
 * @property bool|null $OdxDetIzq
 * @property string|null $OdxDetDes
 * @property string|null $EstReg
 * @property string|null $CarFlaAct
 */
class OdontogramaDetalle extends Entity
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
        'OdxCod' => true,
        'OdxDetNum' => true,
        'OdxDetNumDie' => true,
        'OdxDetVes' => true,
        'OdxDetPal' => true,
        'OdxDetLin' => true,
        'OdxDetDer' => true,
        'OdxDetIzq' => true,
        'OdxDetDes' => true,
        'EstReg' => true,
        'CarFlaAct' => true,
    ];
}
