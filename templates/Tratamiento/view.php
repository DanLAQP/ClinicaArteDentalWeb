<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tratamiento $tratamiento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Tratamiento'), ['action' => 'edit', $tratamiento->TraCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Tratamiento'), ['action' => 'delete', $tratamiento->TraCod], ['confirm' => __('Esta seguro de eliminar el registro # {0}?', $tratamiento->TraCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Tratamientos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Tratamiento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tratamiento view content">
            <h3><?= h($tratamiento->TraCod) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estado de registro') ?></th>
                    <td><?= h($tratamiento->EstReg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Flag Actualizacion') ?></th>
                    <td><?= h($tratamiento->CarFlaAct) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo de Tratamiento') ?></th>
                    <td><?= $this->Number->format($tratamiento->TraCod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo de Historia Clinica') ?></th>
                    <td><?= $this->Number->format($tratamiento->HisCliCod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $tratamiento->TraCan === null ? '' : $this->Number->format($tratamiento->TraCan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Unitario') ?></th>
                    <td><?= $tratamiento->TraCosUni === null ? '' : $this->Number->format($tratamiento->TraCosUni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Total') ?></th>
                    <td><?= $tratamiento->TraCosTot === null ? '' : $this->Number->format($tratamiento->TraCosTot) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Detalle Tratamiento') ?></h4>
                <?php if (!empty($tratamiento->detalle_tratamiento)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Detalle Codigo') ?></th>
                            <th><?= __('Codigo de Tratamiento') ?></th>
                            <th><?= __('Num. detalle') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Est. registro') ?></th>
                            <th><?= __('Fla Actualizacion') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($tratamiento->detalle_tratamiento as $detalleTratamiento) : ?>
                        <tr>
                            <td><?= h($detalleTratamiento->DetTraCod) ?></td>
                            <td><?= h($detalleTratamiento->TraCod) ?></td>
                            <td><?= h($detalleTratamiento->DetTraNum) ?></td>
                            <td><?= h($detalleTratamiento->DetTraDes) ?></td>
                            <td><?= h($detalleTratamiento->EstReg) ?></td>
                            <td><?= h($detalleTratamiento->CarFlaAct) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DetalleTratamiento', 'action' => 'view', $detalleTratamiento->DetTraCod]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DetalleTratamiento', 'action' => 'edit', $detalleTratamiento->DetTraCod]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetalleTratamiento', 'action' => 'delete', $detalleTratamiento->DetTraCod], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleTratamiento->DetTraCod)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
