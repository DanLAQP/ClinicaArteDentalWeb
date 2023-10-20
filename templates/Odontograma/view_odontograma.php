<!-- templates/Odontograma/view_odontograma.ctp -->
<div class="odontograma view content">
    <h3>Odontograma <?= h($odontograma->OdxCod) ?></h3>
    <p><strong>Historia Clinica:</strong> <?= h($odontograma->HisCliCod) ?></p>
    <p><strong>Estado de Registro:</strong> <?= h($odontograma->EstReg) ?></p>
    <p><strong>Bandera de Actualizacion:</strong> <?= h($odontograma->CarFlaAct) ?></p>
    <br>
    <h4>Detalles del Odontograma</h4>
    <div class="table-responsive"> <!-- Agrega la clase table-responsive para hacer la tabla responsiva -->
        <table class="table">
            <thead>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <th><?= __('Codigo de Detalle') ?></th>
                    <th><?= __('Codigo de Odontograma') ?></th>
                    <th><?= __('Numero de Detalle') ?></th>
                    <th><?= __('Numero de Diente') ?></th>
                    <th><?= __('Vestibular') ?></th>
                    <th><?= __('Palatino') ?></th>
                    <th><?= __('Lingual') ?></th>
                    <th><?= __('Derecha') ?></th>
                    <th><?= __('Izquierda') ?></th>
                    <th><?= __('Estado Registro') ?></th>
                    <th><?= __('Bandera de actualizacion') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($odontograma->odontograma_detalles as $detalle): ?>
                    <tr>
                        <td><?= h($detalle->OdxDetDes) ?></td>
                        <td><?= h($detalle->OdxDetCod) ?></td>
                        <td><?= h($detalle->OdxCod) ?></td>
                        <td><?= h($detalle->OdxDetNum) ?></td>
                        <td><?= h($detalle->OdxDetNumDie) ?></td>
                        <td><?= h($detalle->OdxDetVes) ? __('Sí') : __('No'); ?></td>
                        <td><?= h($detalle->OdxDetPal) ? __('Sí') : __('No'); ?></td>
                        <td><?= h($detalle->OdxDetLin) ? __('Sí') : __('No'); ?></td>
                        <td><?= h($detalle->OdxDetDer) ? __('Sí') : __('No'); ?></td>
                        <td><?= h($detalle->OdxDetIzq) ? __('Sí') : __('No'); ?></td>
                        <td><?= h($detalle->EstReg) ?></td>
                        <td><?= h($detalle->CarFlaAct) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
</div>
