<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HistorialTrabajo Entity
 *
 * @property int $HisTraCod
 * @property int $HisCliCod
 * @property int|null $HisTraFecAno
 * @property int|null $HisTraFecMes
 * @property int|null $HisTraFecDia
 * @property bool|null $HisTraLab
 * @property string|null $HisTraDocNom
 * @property string|null $HisTraTra
 * @property int|null $HisTraAcu
 * @property int|null $HisTraSal
 * @property bool|null $HisTraFirPac
 * @property string|null $HisTraObs
 * @property string|null $EstReg
 * @property string|null $CarFlaAct
 */
class HistorialTrabajo extends Entity
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
        'HisCliCod' => true,
        'HisTraFecAno' => true,
        'HisTraFecMes' => true,
        'HisTraFecDia' => true,
        'HisTraLab' => true,
        'HisTraDocNom' => true,
        'HisTraTra' => true,
        'HisTraAcu' => true,
        'HisTraSal' => true,
        'HisTraFirPac' => true,
        'HisTraObs' => true,
        'EstReg' => true,
        'CarFlaAct' => true,
    ];
}
