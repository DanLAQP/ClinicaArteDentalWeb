<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OdontogramaDetalle> $odontogramaDetalle
 */
?>
<div class="odontogramaDetalle index content">
    <?= $this->Html->link(__('Nuevo Odontograma Detalle'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Odontograma Detalle') ?></h3>
    <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
    <?= $this->Form->input('OdxDetCod', [
        'label' => 'OdxDetCod',
        'placeholder' => 'Codigo del OD...',
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
                <th><?= $this->Paginator->sort('OdxDetCod', 'Código del Detalle del Odontograma') ?></th>
<th><?= $this->Paginator->sort('OdxCod', 'Código del Odontograma') ?></th>
<th><?= $this->Paginator->sort('OdxDetNum', 'Número de Detalle') ?></th>
<th><?= $this->Paginator->sort('OdxDetNumDie', 'Número de Diente') ?></th>
<th><?= $this->Paginator->sort('OdxDetVes', 'VES') ?></th>
<th><?= $this->Paginator->sort('OdxDetPal', 'PAL') ?></th>
<th><?= $this->Paginator->sort('OdxDetLin', 'LIN') ?></th>
<th><?= $this->Paginator->sort('OdxDetDer', 'DER') ?></th>
<th><?= $this->Paginator->sort('OdxDetIzq', 'IZQ') ?></th>
<th><?= $this->Paginator->sort('OdxDetDes', 'Descripcion') ?></th>
<th><?= $this->Paginator->sort('EstReg', 'Estado de Registro') ?></th>
<th><?= $this->Paginator->sort('CarFlaAct', 'Actualizacion') ?></th>

                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($odontogramaDetalle as $odontogramaDetalle): ?>
                <tr>
                    <td><?= $this->Number->format($odontogramaDetalle->OdxDetCod) ?></td>
                    <td><?= $this->Number->format($odontogramaDetalle->OdxCod) ?></td>
                    <td><?= $this->Number->format($odontogramaDetalle->OdxDetNum) ?></td>
                    <td><?= $odontogramaDetalle->OdxDetNumDie === null ? '' : $this->Number->format($odontogramaDetalle->OdxDetNumDie) ?></td>
                    <td><?= h($odontogramaDetalle->OdxDetVes) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($odontogramaDetalle->OdxDetPal) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($odontogramaDetalle->OdxDetLin) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($odontogramaDetalle->OdxDetDer) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($odontogramaDetalle->OdxDetIzq) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($odontogramaDetalle->OdxDetDes) ?></td>
                    <td><?= h($odontogramaDetalle->EstReg) ?></td>
                    <td><?= h($odontogramaDetalle->CarFlaAct) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $odontogramaDetalle->OdxDetCod], [
    'escape' => false,
    'title' => __('Ver')
]) ?>
<?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $odontogramaDetalle->OdxDetCod], [
    'escape' => false,
    'title' => __('Editar')
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $odontogramaDetalle->OdxDetCod], [
    'escape' => false,
    'title' => __('Eliminar'),
    'confirm' => __('¿Estás seguro de que deseas eliminar el registro # {0}?', $odontogramaDetalle->OdxDetCod)
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $odontogramaDetalle->OdxDetCod], [
    'escape' => false,
    'title' => __('Inactivar'),
    'confirm' => __('¿Estás seguro de que deseas inactivar este registro?'),
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $odontogramaDetalle->OdxDetCod], [
    'escape' => false,
    'title' => __('Reactivar'),
    'confirm' => __('¿Estás seguro de que deseas reactivar este registro?'),
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
