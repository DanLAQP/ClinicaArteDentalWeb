<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Odontologo> $odontologo
 */
?>
<div class="odontologo index content">
    <?= $this->Html->link(__('Nuevo Odontologo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Odontologo') ?></h3>
    <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
    <?= $this->Form->input('OdoCod', [
        'label' => 'OdoCod',
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
                    <th><?= $this->Paginator->sort('OdoCod', 'Cod del Odontologo') ?></th>
                    <th><?= $this->Paginator->sort('OdoNom', 'Nombres') ?></th>
                    <th><?= $this->Paginator->sort('OdoFecIngAno', 'Año de Ingreso') ?></th>
                    <th><?= $this->Paginator->sort('OdoFecIngMes', 'Mes de Ingreso') ?></th>
                    <th><?= $this->Paginator->sort('OdoFecIngDia', 'Dia de Ingreso') ?></th>
                    <th><?= $this->Paginator->sort('EstReg', 'Estado de Registro') ?></th>
                    <th><?= $this->Paginator->sort('CarFlaAct', 'Actualizacion') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($odontologo as $odontologo): ?>
                <tr>
                    <td><?= $this->Number->format($odontologo->OdoCod) ?></td>
                    <td><?= h($odontologo->OdoNom) ?></td>
                    <td><?= $odontologo->OdoFecIngAno === null ? '' : $this->Number->format($odontologo->OdoFecIngAno) ?></td>
                    <td><?= $odontologo->OdoFecIngMes === null ? '' : $this->Number->format($odontologo->OdoFecIngMes) ?></td>
                    <td><?= $odontologo->OdoFecIngDia === null ? '' : $this->Number->format($odontologo->OdoFecIngDia) ?></td>
                    <td><?= h($odontologo->EstReg) ?></td>
                    <td><?= h($odontologo->CarFlaAct) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $odontologo->OdoCod], [
                        'class' => 'btn btn-primary',
                        'escape' => false,
                        'title' => 'Ver'
                    ]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $odontologo->OdoCod], [
                        'class' => 'btn btn-primary',
                        'escape' => false,
                        'title' => 'Editar'
                    ]) ?>
                    <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $odontologo->OdoCod], [
                        'class' => 'btn btn-danger',
                        'escape' => false,
                        'title' => 'Eliminar',
                        'confirm' => __('¿Estás seguro de eliminar el registro # {0}?', $odontologo->OdoCod)
                    ]) ?>
                    <?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $odontologo->OdoCod], [
                        'class' => 'btn btn-warning',
                        'escape' => false,
                        'title' => 'Inactivar',
                        'confirm' => __('¿Estás seguro de inactivar este registro?')
                    ]) ?>
                    <?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $odontologo->OdoCod], [
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
