<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DetalleTratamiento> $detalleTratamiento
 */
?>
<div class="detalleTratamiento index content">
    <?= $this->Html->link(__('Nuevo Detalle Tratamiento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Detalle Tratamiento') ?></h3>
    <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
    <?= $this->Form->input('DetTraCod', [
        'label' => 'DetTraCod',
        'placeholder' => 'Codigo del Odontologo...',
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
                    <th><?= $this->Paginator->sort('DetTraCod', __('Codigo de detalle')) ?></th>
                    <th><?= $this->Paginator->sort('TraCod', __('Codigo tratamiento')) ?></th>
                    <th><?= $this->Paginator->sort('DetTraCan', __('Cantidad')) ?></th>
                    <th><?= $this->Paginator->sort('DetTraCosUni', __('Costo Unitario')) ?></th>
                    <th><?= $this->Paginator->sort('DetTrCosTot', __('Costo Total')) ?></th>
                    <th><?= $this->Paginator->sort('DetTraEst', __('Estado del Tratamiento')) ?></th>
                    <th><?= $this->Paginator->sort('DetTraDes', __('Descripcion')) ?></th>
                    <th><?= $this->Paginator->sort('EstReg', __('Estado registro')) ?></th>
                    <th><?= $this->Paginator->sort('CarFlaAct', __('Actualizacion')) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalleTratamiento as $detalleTratamiento): ?>
                <tr>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCod) ?></td>
                    <td><?= $this->Number->format($detalleTratamiento->TraCod) ?></td>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCan) ?></td>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCosUni) ?></td>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCosTot) ?></td>
                    <td><?= h($detalleTratamiento->DetTraEst) ?></td>
                    <td><?= h($detalleTratamiento->DetTraDes) ?></td>
                    <td><?= h($detalleTratamiento->EstReg) ?></td>
                    <td><?= h($detalleTratamiento->CarFlaAct) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $detalleTratamiento->DetTraCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Ver'
]) ?>
<?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $detalleTratamiento->DetTraCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Editar'
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $detalleTratamiento->DetTraCod], [
    'class' => 'btn btn-danger',
    'escape' => false,
    'title' => 'Eliminar',
    'confirm' => __('¿Estás seguro de eliminar el registro # {0}?', $detalleTratamiento->DetTraCod)
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $detalleTratamiento->DetTraCod], [
    'class' => 'btn btn-warning',
    'escape' => false,
    'title' => 'Inactivar',
    'confirm' => __('¿Estás seguro de inactivar este registro?')
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $detalleTratamiento->DetTraCod], [
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
