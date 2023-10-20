<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistorialTrabajo $historialTrabajo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Historial Trabajo'), ['action' => 'edit', $historialTrabajo->HisTraCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Historial Trabajo'), ['action' => 'delete', $historialTrabajo->HisTraCod], ['confirm' => __('Esta seguro de eliminar el registro # {0}?', $historialTrabajo->HisTraCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Historial Trabajo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Historial Trabajo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="historialTrabajo view content">
            <h3><?= h($historialTrabajo->HisTraCod) ?></h3>
            <table>
    <tr>
        <th><?= __('Nombre del Documento') ?></th>
        <td><?= h($historialTrabajo->HisTraDocNom) ?></td>
    </tr>
    <tr>
        <th><?= __('Trabajo') ?></th>
        <td><?= h($historialTrabajo->HisTraTra) ?></td>
    </tr>
    <tr>
        <th><?= __('Observaciones') ?></th>
        <td><?= h($historialTrabajo->HisTraObs) ?></td>
    </tr>
    <tr>
        <th><?= __('Estado de Registro') ?></th>
        <td><?= h($historialTrabajo->EstReg) ?></td>
    </tr>
    <tr>
        <th><?= __('Actualizacion') ?></th>
        <td><?= h($historialTrabajo->CarFlaAct) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Historial de Trabajo') ?></th>
        <td><?= $this->Number->format($historialTrabajo->HisTraCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Historia Clínica') ?></th>
        <td><?= $this->Number->format($historialTrabajo->HisCliCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Año de Fecha') ?></th>
        <td><?= $historialTrabajo->HisTraFecAno === null ? '' : $this->Number->format($historialTrabajo->HisTraFecAno) ?></td>
    </tr>
    <tr>
        <th><?= __('Mes de Fecha') ?></th>
        <td><?= $historialTrabajo->HisTraFecMes === null ? '' : $this->Number->format($historialTrabajo->HisTraFecMes) ?></td>
    </tr>
    <tr>
        <th><?= __('Día de Fecha') ?></th>
        <td><?= $historialTrabajo->HisTraFecDia === null ? '' : $this->Number->format($historialTrabajo->HisTraFecDia) ?></td>
    </tr>
    <tr>
        <th><?= __('A cuenta') ?></th>
        <td><?= $historialTrabajo->HisTraAcu === null ? '' : $this->Number->format($historialTrabajo->HisTraAcu) ?></td>
    </tr>
    <tr>
        <th><?= __('Saldo') ?></th>
        <td><?= $historialTrabajo->HisTraSal === null ? '' : $this->Number->format($historialTrabajo->HisTraSal) ?></td>
    </tr>
    <tr>
        <th><?= __('Laboratorio') ?></th>
        <td><?= $historialTrabajo->HisTraLab ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Firma del Paciente') ?></th>
        <td><?= $historialTrabajo->HisTraFirPac ? __('Sí') : __('No'); ?></td>
    </tr>
</table>
        </div>
    </div>
</div>
