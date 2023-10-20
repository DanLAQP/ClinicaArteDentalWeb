<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paciente Entity
 *
 * @property int $PacCod
 * @property string|null $PacDir
 * @property int|null $PacAnoNac
 * @property int|null $PacCel
 * @property string|null $PacEma
 * @property int|null $PacDni
 * @property string|null $PacNom
 * @property string|null $PacOcu
 * @property string|null $PacRef
 * @property string|null $PacEstReg
 * @property string|null $PacCarFlaAct
 *
 * @property \App\Model\Entity\HistoriaClinica $historia_clinica
 */
class Paciente extends Entity
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
        'PacDir' => true,
        'PacAnoNac' => true,
        'PacCel' => true,
        'PacEma' => true,
        'PacDni' => true,
        'PacNom' => true,
        'PacOcu' => true,
        'PacRef' => true,
        'PacEstReg' => true,
        'PacCarFlaAct' => true,
    ];
}
