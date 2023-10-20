<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cita $cita
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Cita'), ['action' => 'edit', $cita->CitCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Cita'), ['action' => 'delete', $cita->CitCod], ['confirm' => __('Esta seguro que desea eliminar la cita # {0}?', $cita->CitCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Citas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Cita'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="citas view content">
            <h3><?= h($cita->CitCod) ?></h3>
            <table>
            <tr>
                <th>Código de Cita</th>
                <td><?= $this->Number->format($cita->CitCod) ?></td>
            </tr>
            <tr>
                <th>Código del Paciente</th>
                <td><?= $cita->PacCod === null ? '' : $this->Number->format($cita->PacCod) ?></td>
            </tr>
            <tr>
                <th>Código del Odontólogo</th>
                <td><?= $cita->OdoCod === null ? '' : $this->Number->format($cita->OdoCod) ?></td>
            </tr>
                <th>Duración</th>
                <td><?= h($cita->Duracion) ?></td>
            </tr>
            <tr>
                <th>Estado de la Cita</th>
                <td><?= h($cita->CitEst) ?></td>
            </tr>
            <tr>

            <tr>
                <th>Fecha y Hora de la Cita</th>
                <td><?= h($cita->CitFecHor) ?></td>
            </tr>

            </table>
        </div>
    </div>
</div>
