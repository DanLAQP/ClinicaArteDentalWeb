<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HistoriaMedica Entity
 *
 * @property int $HisMedCod
 * @property bool|null $HisMedProCar
 * @property bool|null $HisMedEnfRen
 * @property bool|null $HisMedDia
 * @property bool|null $HisMedHip
 * @property bool|null $HisMedEpi
 * @property bool|null $HisMedVIH
 * @property bool|null $HisMedHep
 * @property bool|null $HisMedPro
 * @property bool|null $HisMedAle
 * @property bool|null $HisMedProCoa
 * @property bool|null $HisMedTomMed
 * @property bool|null $HisMedEmb
 * @property bool|null $HisMedProTraDen
 * @property bool|null $HisMedHab
 * @property bool|null $HisMedEsp
 * @property string|null $EstReg
 * @property string|null $CarFlaAct
 */
class HistoriaMedica extends Entity
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
        'HisMedProCar' => true,
        'HisMedEnfRen' => true,
        'HisMedDia' => true,
        'HisMedHip' => true,
        'HisMedEpi' => true,
        'HisMedVIH' => true,
        'HisMedHep' => true,
        'HisMedPro' => true,
        'HisMedAle' => true,
        'HisMedProCoa' => true,
        'HisMedTomMed' => true,
        'HisMedEmb' => true,
        'HisMedProTraDen' => true,
        'HisMedHab' => true,
        'HisMedEsp' => true,
        'EstReg' => true,
        'CarFlaAct' => true,
    ];
}
