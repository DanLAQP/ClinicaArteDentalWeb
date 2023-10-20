<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\HistoriaClinica> $historiaClinica
 */
?>


<div class="historiaClinica index content">
    <?= $this->Html->link(__('Nueva Historia Clinica'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Historia Clinica') ?></h3>

<?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
<?= $this->Form->input('hisCliCod', [
    'label' => 'HisCliCod',
    'placeholder' => 'Codigo de la HC...',
    'style' => 'margin-left: 10px; max-width: 200px; height: 35px;', // Añade un margen izquierdo de 10px y limita el ancho a 350px
    'type' => 'number', // Indica que el campo aceptará solo números
    'maxlength' => 8, // Limita la longitud máxima a 8 caracteres
    'min' => 1, // Asegura que solo se ingresen números positivos
    'step' => 1,
]) ?>
<!--campo para buscar por nombre del paciente -->

<?= $this->Form->input('pacNom', [
    'label' => 'Nombre del Paciente',
    'placeholder' => 'Nombre del paciente...',
    'style' => 'margin-left: 10px; max-width: 200px; height: 35px;',
    'pattern' => '^[A-Za-z]+$',
    'title' => 'Por favor, ingrese solo letras (mayúsculas o minúsculas) en este campo.',
]) ?>


<?= $this->Form->button('Buscar', ['style' => 'margin-left: 10px;']) ?>

<?= $this->Form->end() ?>


    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                <th><?= $this->Paginator->sort('HisCliCod', 'Historia Clinica') ?></th>
                <th><?= $this->Paginator->sort('Nombres del Paciente') ?></th>
                <th><?= $this->Paginator->sort('PacCod', 'Código de Paciente') ?></th>
                <th><?= $this->Paginator->sort('OdoCod', 'Código de Odontólogo') ?></th>
                <th><?= $this->Paginator->sort('HisMedCod', 'Código de Historia Médica') ?></th>
                <th><?= $this->Paginator->sort('HisCliOdoAce', 'Aceptación del Odontólogo') ?></th>
                <th><?= $this->Paginator->sort('HisCliPacAce', 'Aceptación del Paciente') ?></th>
                <th><?= $this->Paginator->sort('HisCliAno', 'Año') ?></th>
                <th><?= $this->Paginator->sort('HisCliMes', 'Mes') ?></th>
                <th><?= $this->Paginator->sort('HisCliDia', 'Día') ?></th>
                <th><?= $this->Paginator->sort('EstReg', 'Estado Registro') ?></th>
                <th><?= $this->Paginator->sort('CarFlaAct', 'Actualizacion') ?></th>
                <th class="actions"><?= __('Acciones :') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historiaClinica as $historiaClinica): ?>
                <tr>
                    <td><?= $this->Number->format($historiaClinica->HisCliCod) ?></td>
                    <!-- mostrando los nombres del paciente -->
                    <td><?= $historiaClinica->has('paciente') ? h($historiaClinica->paciente->PacNom) : '' ?></td>
                    <td><?= $historiaClinica->PacCod === null ? '' : $this->Number->format($historiaClinica->PacCod) ?></td>
                    <td><?= $historiaClinica->OdoCod === null ? '' : $this->Number->format($historiaClinica->OdoCod) ?></td>
                    <td><?= $historiaClinica->HisMedCod === null ? '' : $this->Number->format($historiaClinica->HisMedCod) ?></td>
                    <td><?= h($historiaClinica->HisCliOdoAce) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaClinica->HisCliPacAce)  ? __('Sí') : __('No'); ?></td>
                    <td><?= $historiaClinica->HisCliAno === null ? '' : $this->Number->format($historiaClinica->HisCliAno) ?></td>
                    <td><?= $historiaClinica->HisCliMes === null ? '' : $this->Number->format($historiaClinica->HisCliMes) ?></td>
                    <td><?= $historiaClinica->HisCliDia === null ? '' : $this->Number->format($historiaClinica->HisCliDia) ?></td>
                    <td><?= h($historiaClinica->EstReg) ?></td>
                    <td><?= h($historiaClinica->CarFlaAct) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $historiaClinica->HisCliCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Ver'
]) ?>
<?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'viewHistoria', $historiaClinica->HisCliCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Ver Historia Completa'
]) ?>

<?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $historiaClinica->HisCliCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Editar'
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $historiaClinica->HisCliCod], [
    'class' => 'btn btn-danger',
    'escape' => false,
    'title' => 'Eliminar',
    'confirm' => __('¿Estás seguro de eliminar el registro # {0}?', $historiaClinica->HisCliCod)
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $historiaClinica->HisCliCod], [
    'class' => 'btn btn-warning',
    'escape' => false,
    'title' => 'Inactivar',
    'confirm' => __('¿Estás seguro de inactivar este registro?')
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $historiaClinica->HisCliCod], [
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
