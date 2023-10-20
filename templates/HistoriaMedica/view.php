<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoriaMedica $historiaMedica
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Historia Medica'), ['action' => 'edit', $historiaMedica->HisMedCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Historia Medica'), ['action' => 'delete', $historiaMedica->HisMedCod], ['confirm' => __('Esta seguro de eliminar el registro # {0}?', $historiaMedica->HisMedCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista Historia Medica'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Historia Medica'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="historiaMedica view content">
            <h3><?= h($historiaMedica->HisMedCod) ?></h3>
            <table>
    <tr>
        <th><?= __('Estado de Registro') ?></th>
        <td><?= h($historiaMedica->EstReg) ?></td>
    </tr>
    <tr>
        <th><?= __('Actualizacion') ?></th>
        <td><?= h($historiaMedica->CarFlaAct) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Historia Médica') ?></th>
        <td><?= $this->Number->format($historiaMedica->HisMedCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Problemas Cardíacos') ?></th>
        <td><?= $historiaMedica->HisMedProCar ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Enfermedades Renales') ?></th>
        <td><?= $historiaMedica->HisMedEnfRen ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Diabetes') ?></th>
        <td><?= $historiaMedica->HisMedDia ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Hipertensión') ?></th>
        <td><?= $historiaMedica->HisMedHip ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Epilepsia') ?></th>
        <td><?= $historiaMedica->HisMedEpi ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('VIH') ?></th>
        <td><?= $historiaMedica->HisMedVIH ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Hepatitis') ?></th>
        <td><?= $historiaMedica->HisMedHep ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Problemas Respiratorios') ?></th>
        <td><?= $historiaMedica->HisMedPro ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Alergias') ?></th>
        <td><?= $historiaMedica->HisMedAle ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Problemas de Coagulación') ?></th>
        <td><?= $historiaMedica->HisMedProCoa ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Toma de Medicamentos') ?></th>
        <td><?= $historiaMedica->HisMedTomMed ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Embarazo') ?></th>
        <td><?= $historiaMedica->HisMedEmb ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Problemas Traumáticos Dentales') ?></th>
        <td><?= $historiaMedica->HisMedProTraDen ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Hábitos') ?></th>
        <td><?= $historiaMedica->HisMedHab ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Específicos') ?></th>
        <td><?= $historiaMedica->HisMedEsp ? __('Sí') : __('No'); ?></td>
    </tr>
</table>
        </div>
    </div>
</div>
