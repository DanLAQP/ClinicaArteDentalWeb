<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cita Entity
 *
 * @property int $CitCod
 * @property int|null $PacCod
 * @property int|null $OdoCod
 * @property \Cake\I18n\FrozenTime|null $CitFecHor
 * @property string|null $Duracion
 * @property string|null $CitEst
 */
class Cita extends Entity
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
        'PacCod' => true,
        'OdoCod' => true,
        'CitFecHor' => true,
        'Duracion' => true,
        'CitEst' => true,
    ];
}
