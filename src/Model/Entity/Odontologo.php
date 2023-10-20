<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Odontologo Entity
 *
 * @property int $OdoCod
 * @property string|null $OdoNom
 * @property int|null $OdoFecIngAno
 * @property int|null $OdoFecIngMes
 * @property int|null $OdoFecIngDia
 * @property string|null $EstReg
 * @property string|null $CarFlaAct
 */
class Odontologo extends Entity
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
        'OdoNom' => true,
        'OdoFecIngAno' => true,
        'OdoFecIngMes' => true,
        'OdoFecIngDia' => true,
        'EstReg' => true,
        'CarFlaAct' => true,
    ];
}
