<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paciente $paciente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <?= $this->Html->link(__('Editar Paciente'), ['action' => 'edit', $paciente->PacCod]) ?><br>
<?= $this->Form->postLink(__('Eliminar Paciente'), ['action' => 'delete', $paciente->PacCod], ['confirm' => __('¿Esta seguro de eliminar al paciente # {0}?', $paciente->PacCod)]) ?><br>

<?= $this->Html->link(__('Lista de Pacientes'), ['action' => 'index']) ?><br>
<?= $this->Html->link(__('Nuevo Paciente'), ['action' => 'add']) ?><br>

        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="paciente view content">
            <h3><?= h($paciente->PacCod) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo del Paciente') ?></th>
                    <td><?= $this->Number->format($paciente->PacCod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($paciente->PacNom) ?></td>
                </tr>
                <tr>
                    <th><?= __('DNI') ?></th>
                    <td><?= $paciente->PacDni === null ? '' : $this->Number->format($paciente->PacDni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= $paciente->PacCel === null ? '' : $this->Number->format($paciente->PacCel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($paciente->PacDir) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($paciente->PacEma) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ocupacion') ?></th>
                    <td><?= h($paciente->PacOcu) ?></td>
                </tr>
                <tr>
                    <th><?= __('Referido') ?></th>
                    <td><?= h($paciente->PacRef) ?></td>
                </tr>
                <tr>
                    <th><?= __('Año de Nacimiento') ?></th>
                    <td><?= $paciente->PacAnoNac === null ? '' : $this->Number->format($paciente->PacAnoNac) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado de Registro') ?></th>
                    <td><?= h($paciente->PacEstReg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bandera de Actializacion') ?></th>
                    <td><?= h($paciente->PacCarFlaAct) ?></td>
                </tr>
            </table>

        </div>
    </div>
</div>
