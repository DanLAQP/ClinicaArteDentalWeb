<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HistoriaClinica Entity
 *
 * @property int $HisCliCod
 * @property int|null $PacCod
 * @property int|null $OdoCod
 * @property int|null $HisMedCod
 * @property bool|null $HisCliOdoAce
 * @property bool|null $HisCliPacAce
 * @property int|null $HisCliAno
 * @property int|null $HisCliMes
 * @property int|null $HisCliDia
 * @property string|null $EstReg
 * @property string|null $CarFlaAct
 */
class HistoriaClinica extends Entity
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
        'HisMedCod' => true,
        'HisCliOdoAce' => true,
        'HisCliPacAce' => true,
        'HisCliAno' => true,
        'HisCliMes' => true,
        'HisCliDia' => true,
        'EstReg' => true,
        'CarFlaAct' => true,
    ];
}
