<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OdontogramaDetalle $odontogramaDetalle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Odontograma Detalle'), ['action' => 'edit', $odontogramaDetalle->OdxDetCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Odontograma Detalle'), ['action' => 'delete', $odontogramaDetalle->OdxDetCod], ['confirm' => __('Esta seguro de eliminar el registro # {0}?', $odontogramaDetalle->OdxDetCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Odontograma Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Odontograma Detalle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="odontogramaDetalle view content">
            <h3><?= h($odontogramaDetalle->OdxDetCod) ?></h3>
            <table>
    <tr>
        <th><?= __('Descripción de Detalle de Odontograma') ?></th>
        <td><?= h($odontogramaDetalle->OdxDetDes) ?></td>
    </tr>
    <tr>
        <th><?= __('Estado de Registro') ?></th>
        <td><?= h($odontogramaDetalle->EstReg) ?></td>
    </tr>
    <tr>
        <th><?= __('Actualizacion') ?></th>
        <td><?= h($odontogramaDetalle->CarFlaAct) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Detalle de Odontograma') ?></th>
        <td><?= $this->Number->format($odontogramaDetalle->OdxDetCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Código de Odontograma') ?></th>
        <td><?= $this->Number->format($odontogramaDetalle->OdxCod) ?></td>
    </tr>
    <tr>
        <th><?= __('Número de Detalle de Odontograma') ?></th>
        <td><?= $this->Number->format($odontogramaDetalle->OdxDetNum) ?></td>
    </tr>
    <tr>
        <th><?= __('Número de Diente') ?></th>
        <td><?= $odontogramaDetalle->OdxDetNumDie === null ? '' : $this->Number->format($odontogramaDetalle->OdxDetNumDie) ?></td>
    </tr>
    <tr>
        <th><?= __('Detalle de Odontograma VES') ?></th>
        <td><?= $odontogramaDetalle->OdxDetVes ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Detalle de Odontograma PAL') ?></th>
        <td><?= $odontogramaDetalle->OdxDetPal ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Detalle de Odontograma LIN') ?></th>
        <td><?= $odontogramaDetalle->OdxDetLin ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Detalle de Odontograma DER') ?></th>
        <td><?= $odontogramaDetalle->OdxDetDer ? __('Sí') : __('No'); ?></td>
    </tr>
    <tr>
        <th><?= __('Detalle de Odontograma IZQ') ?></th>
        <td><?= $odontogramaDetalle->OdxDetIzq ? __('Sí') : __('No'); ?></td>
    </tr>
</table>

        </div>
    </div>
</div>
