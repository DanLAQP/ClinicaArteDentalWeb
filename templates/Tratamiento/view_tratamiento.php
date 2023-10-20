<!-- templates/Tratamiento/view_tratamiento.ctp -->
<div class="tratamiento view content">
    <h3>Tratamiento <?= h($tratamiento->TraCod) ?></h3>
    <p><strong>Código de Historia Clínica:</strong> <?= h($tratamiento->HisCliCod) ?></p>
    <p><strong>Descripcion:</strong> <?= h($tratamiento->TraDes) ?></p>
    <p><strong>Estado de Registro:</strong> <?= h($tratamiento->EstReg) ?></p>
    <p><strong>Actualización:</strong> <?= h($tratamiento->CarFlaAct) ?></p>
    <br>
    <h4>Detalles del Tratamiento</h4>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= __('Código de Detalle') ?></th>
                    <th><?= __('Cantidad') ?></th>
                    <th><?= __('Costo Unitario') ?></th>
                    <th><?= __('Costo Total') ?></th>
                    <th><?= __('Estado del Tratamiento') ?></th>
                    <th><?= __('Estado de registro') ?></th>
                    <th><?= __('Actualizacion') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tratamiento->detalle_tratamiento as $detalle): ?>
                    <tr>
                        <td><?= h($detalle->DetTraCod) ?></td>
                        <td><?= h($detalle->DetTraCan) ?></td>
                        <td><?= h($detalle->DetTraCosUni) ?></td>
                        <td><?= h($detalle->DetTraCosTot) ?></td>
                        <td><?= h($detalle->DetTraEst) ?></td>
                        <td><?= h($detalle->EstReg) ?></td>
                        <td><?= h($detalle->CarFlaAct) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>


</div>
