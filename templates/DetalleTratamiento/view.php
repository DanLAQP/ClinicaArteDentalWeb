<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleTratamiento $detalleTratamiento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Detalle Tratamiento'), ['action' => 'edit', $detalleTratamiento->DetTraCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Detalle Tratamiento'), ['action' => 'delete', $detalleTratamiento->DetTraCod], ['confirm' => __('Esta seguro que desea elimnar el registro # {0}?', $detalleTratamiento->DetTraCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista del Detalle Tratamiento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Detalle Tratamiento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="detalleTratamiento view content">
            <h3><?= h($detalleTratamiento->DetTraCod) ?></h3>
            <table>


                <tr>
                    <th><?= __('Codigo de detalle') ?></th>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCod) ?></td>
                </tr>

                <tr>
                    <th><?= __('Codigo de tratamiento') ?></th>
                    <td><?= $this->Number->format($detalleTratamiento->TraCod) ?></td>
                </tr>

                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($detalleTratamiento->DetTraDes) ?></td>
                </tr>

                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Unitario') ?></th>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCosUni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Total') ?></th>
                    <td><?= $this->Number->format($detalleTratamiento->DetTraCosTot) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado del tratamiento') ?></th>
                    <td><?= h($detalleTratamiento->DetTraEst) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado registro') ?></th>
                    <td><?= h($detalleTratamiento->EstReg) ?></td>
                </tr>

                <tr>
                    <th><?= __('Actualizacion') ?></th>
                    <td><?= h($detalleTratamiento->CarFlaAct) ?></td>
                </tr>


            </table>
        </div>
    </div>
</div>
