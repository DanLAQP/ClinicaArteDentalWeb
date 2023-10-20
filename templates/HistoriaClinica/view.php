<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoriaClinica $historiaClinica
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Historia Clinica'), ['action' => 'edit', $historiaClinica->HisCliCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Historia Clinica'), ['action' => 'delete', $historiaClinica->HisCliCod], ['confirm' => __('Are you sure you want to delete # {0}?', $historiaClinica->HisCliCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Historias Clinicas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Historia Clinica'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="historiaClinica view content">
            <h3><?= h($historiaClinica->HisCliCod) ?></h3>
            <table>

    <tr>
        <th><?= __('Código de Historia Clínica') ?></th>
        <td><?= $this->Number->format($historiaClinica->HisCliCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Paciente') ?></th>
        <td><?= $historiaClinica->PacCod === null ? '' : $this->Number->format($historiaClinica->PacCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Odontólogo') ?></th>
        <td><?= $historiaClinica->OdoCod === null ? '' : $this->Number->format($historiaClinica->OdoCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Historia Médica') ?></th>
        <td><?= $historiaClinica->HisMedCod === null ? '' : $this->Number->format($historiaClinica->HisMedCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Año de Historia Clínica') ?></th>
        <td><?= $historiaClinica->HisCliAno === null ? '' : $this->Number->format($historiaClinica->HisCliAno) ?></td>
    </tr>
    <tr>
        <th><?= __('Mes de Historia Clínica') ?></th>
        <td><?= $historiaClinica->HisCliMes === null ? '' : $this->Number->format($historiaClinica->HisCliMes) ?></td>
    </tr>
    <tr>
        <th><?= __('Día de Historia Clínica') ?></th>
        <td><?= $historiaClinica->HisCliDia === null ? '' : $this->Number->format($historiaClinica->HisCliDia) ?></td>
    </tr>
    <tr>
        <th><?= __('Aceptación del Odontólogo') ?></th>
        <td><?= $historiaClinica->HisCliOdoAce ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Aceptación del Paciente') ?></th>
        <td><?= $historiaClinica->HisCliPacAce ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Estado') ?></th>
        <td><?= h($historiaClinica->EstReg) ?></td>
    </tr>
    <tr>
        <th><?= __('Actualizacion') ?></th>
        <td><?= h($historiaClinica->CarFlaAct) ?></td>
    </tr>
</table>

        </div>
    </div>
</div>
