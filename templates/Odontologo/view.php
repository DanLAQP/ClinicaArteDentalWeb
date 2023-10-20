<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Odontologo $odontologo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Odontologo'), ['action' => 'edit', $odontologo->OdoCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Odontologo'), ['action' => 'delete', $odontologo->OdoCod], ['confirm' => __('Esta seguro de eliminar el registro # {0}?', $odontologo->OdoCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Odontologos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Odontologo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="odontologo view content">
            <h3><?= h($odontologo->OdoCod) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre Odontologo') ?></th>
                    <td><?= h($odontologo->OdoNom) ?></td>
                </tr>
                <tr>
                    <th><?= __('Est. Registro') ?></th>
                    <td><?= h($odontologo->EstReg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actualizacion') ?></th>
                    <td><?= h($odontologo->CarFlaAct) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo del Odontologo') ?></th>
                    <td><?= $this->Number->format($odontologo->OdoCod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Año de Ingreso') ?></th>
                    <td><?= $odontologo->OdoFecIngAno === null ? '' : $this->Number->format($odontologo->OdoFecIngAno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mes de Ingreso') ?></th>
                    <td><?= $odontologo->OdoFecIngMes === null ? '' : $this->Number->format($odontologo->OdoFecIngMes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dia de ingreso') ?></th>
                    <td><?= $odontologo->OdoFecIngDia === null ? '' : $this->Number->format($odontologo->OdoFecIngDia) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
