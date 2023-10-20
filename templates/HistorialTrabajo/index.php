<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\HistorialTrabajo> $historialTrabajo
 */
?>
<div class="historialTrabajo index content">
    <?= $this->Html->link(__('Nueva Historial Trabajo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Historial Trabajo') ?></h3>

    <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
<?= $this->Form->input('HisTraCod', [
    'label' => 'HisTraCod',
    'placeholder' => 'Ingrese el Codigo de la HT...',
    'style' => 'margin-left: 10px; max-width: 200px; height: 35px;', // Añade un margen izquierdo de 10px y limita el ancho a 350px
    'type' => 'number', // Indica que el campo aceptará solo números
    'maxlength' => 8, // Limita la longitud máxima a 8 caracteres
    'min' => 1, // Asegura que solo se ingresen números positivos
    'step' => 1,
]) ?>

<?= $this->Form->button('Buscar', ['style' => 'margin-left: 10px;']) ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>

                <th><?= $this->Paginator->sort('HisTraCod', 'Código de Historial de Trabajo') ?></th>
<th><?= $this->Paginator->sort('HisCliCod', 'Código de Historia Clínica') ?></th>
<th><?= $this->Paginator->sort('HisTraFecAno', 'Año') ?></th>
<th><?= $this->Paginator->sort('HisTraFecMes', 'Mes') ?></th>
<th><?= $this->Paginator->sort('HisTraFecDia', 'Día') ?></th>
<th><?= $this->Paginator->sort('HisTraLab', 'Laboratorio') ?></th>
<th><?= $this->Paginator->sort('HisTraDocNom', 'Nombre del Doctor') ?></th>
<th><?= $this->Paginator->sort('HisTraTra', 'Tratamiento') ?></th>
<th><?= $this->Paginator->sort('HisTraAcu', 'A cuenta') ?></th>
<th><?= $this->Paginator->sort('HisTraSal', 'Saldo') ?></th>
<th><?= $this->Paginator->sort('HisTraFir', 'Firma del Paciente') ?></th>
<th><?= $this->Paginator->sort('HisTraObs', 'Observaciones') ?></th>
<th><?= $this->Paginator->sort('EstReg', 'Estado de Registro') ?></th>
<th><?= $this->Paginator->sort('CarFlaAct', 'Actualización') ?></th>

                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historialTrabajo as $historialTrabajo): ?>
                <tr>
                    <td><?= $this->Number->format($historialTrabajo->HisTraCod) ?></td>
                    <td><?= $this->Number->format($historialTrabajo->HisCliCod) ?></td>
                    <td><?= $historialTrabajo->HisTraFecAno === null ? '' : $this->Number->format($historialTrabajo->HisTraFecAno) ?></td>
                    <td><?= $historialTrabajo->HisTraFecMes === null ? '' : $this->Number->format($historialTrabajo->HisTraFecMes) ?></td>
                    <td><?= $historialTrabajo->HisTraFecDia === null ? '' : $this->Number->format($historialTrabajo->HisTraFecDia) ?></td>
                    <td><?= h($historialTrabajo->HisTraLab)  ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historialTrabajo->HisTraDocNom) ?></td>
                    <td><?= h($historialTrabajo->HisTraTra) ?></td>
                    <td><?= $historialTrabajo->HisTraAcu === null ? '' : $this->Number->format($historialTrabajo->HisTraAcu) ?></td>
                    <td><?= $historialTrabajo->HisTraSal === null ? '' : $this->Number->format($historialTrabajo->HisTraSal) ?></td>
                    <td><?= h($historialTrabajo->HisTraFirPac) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historialTrabajo->HisTraObs) ?></td>
                    <td><?= h($historialTrabajo->EstReg) ?></td>
                    <td><?= h($historialTrabajo->CarFlaAct) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $historialTrabajo->HisTraCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Ver'
]) ?>
<?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $historialTrabajo->HisTraCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Editar'
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $historialTrabajo->HisTraCod], [
    'class' => 'btn btn-danger',
    'escape' => false,
    'title' => 'Eliminar',
    'confirm' => __('¿Estás seguro de eliminar el registro # {0}?', $historialTrabajo->HisTraCod)
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $historialTrabajo->HisTraCod], [
    'class' => 'btn btn-warning',
    'escape' => false,
    'title' => 'Inactivar',
    'confirm' => __('¿Estás seguro de inactivar este registro?')
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $historialTrabajo->HisTraCod], [
    'class' => 'btn btn-success',
    'escape' => false,
    'title' => 'Reactivar',
    'confirm' => __('¿Estás seguro de reactivar este registro?')
]) ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primer')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, que muestra {{current}} registros de un total de {{count}}')) ?></p>
    </div>
    <?= $this->Html->link('Mostrar Todos los registros', ['action' => 'index'], ['class' => 'button', 'style' => 'display: block; text-align: center; margin: 20px auto;']) ?>
</div>
