<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Odontograma> $odontograma
 */
?>
<div class="odontograma index content">
    <?= $this->Html->link(__('Nuevo Odontograma'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Odontograma') ?></h3>

    <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
    <?= $this->Form->input('OdxCod', [
        'label' => 'OdxCod',
        'placeholder' => 'Codigo del Odontograma...',
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
                <th><?= $this->Paginator->sort('OdxCod', 'Código de Odontograma') ?></th>
                <th><?= $this->Paginator->sort('HisCliCod', 'Código de la historia Clinica') ?></th>
                <th><?= $this->Paginator->sort('EstReg', 'Estado de Registro') ?></th>
                <th><?= $this->Paginator->sort('CarFlaAct', 'Actualizacion') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($odontograma as $odontograma): ?>
                <tr>
                    <td><?= $this->Number->format($odontograma->OdxCod) ?></td>
                    <td><?= $this->Number->format($odontograma->HisCliCod) ?></td>
                    <td><?= h($odontograma->EstReg) ?></td>
                    <td><?= h($odontograma->CarFlaAct) ?></td>
                    <td class="actions">
                    <!-- En la vista de Detalle de Odontograma -->
<?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $odontograma->OdxCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Ver'
]) ?>
<?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'viewOdontograma', $odontograma->OdxCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Ver Detalles'
]) ?>
<?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $odontograma->OdxCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Editar'
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $odontograma->OdxCod], [
    'class' => 'btn btn-danger',
    'escape' => false,
    'title' => 'Eliminar',
    'confirm' => __('¿Estás seguro de eliminar el registro # {0}?', $odontograma->OdxCod)
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $odontograma->OdxCod], [
    'class' => 'btn btn-warning',
    'escape' => false,
    'title' => 'Inactivar',
    'confirm' => __('¿Estás seguro de inactivar este registro?')
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $odontograma->OdxCod], [
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
