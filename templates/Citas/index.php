<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cita> $citas
 */
?>
<div class="citas index content">
    <?= $this->Html->link(__('Nueva Cita'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Citas') ?></h3>
    <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
    <?= $this->Form->input('CitFecHor', [
        'label' => 'Fecha',
        'type' => 'date', // Cambia el tipo de entrada a "date"
        'style' => 'margin-left: 10px; max-width: 200px; height: 35px;',
    ]) ?>
    <?= $this->Form->button('Buscar', ['style' => 'margin-left: 10px;']) ?>
    <?= $this->Form->end() ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('CitCod', 'Código de Cita') ?></th>
                    <th><?= __('Nombre del Paciente') ?></th>
                    <th><?= __('Nombre del Odontólogo') ?></th>
                    <th><?= $this->Paginator->sort('CitFecHor', 'Fecha(D/M/A) y Hora') ?></th>
                    <th><?= $this->Paginator->sort('Duracion', 'Duración') ?></th>
                    <th><?= $this->Paginator->sort('CitEst', 'Estado de la Cita') ?></th>
                    <th><?= __('Número de Celular del Paciente') ?></th>
                    <th><?= $this->Paginator->sort('PacCod', 'Código del Paciente') ?></th>
                    <th><?= $this->Paginator->sort('OdoCod', 'Código del Odontólogo') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas as $cita): ?>
                <tr>
                    <td><?= $this->Number->format($cita->CitCod) ?></td>
                    <td><?= $cita->has('paciente') ? $cita->paciente->PacNom : '' ?></td>
                    <td><?= $cita->has('paciente') ? $cita->odontologo->OdoNom : '' ?></td>
                    <td><?= h($cita->CitFecHor->format('d/m/Y H:i:s')) ?></td>
                    <td><?= h($cita->Duracion) ?></td>
                    <td><?= h($cita->CitEst) ?></td>
                    <td>
                        <?php
                        if ($cita->has('paciente') && !empty($cita->paciente->PacCel)) {
                            $numeroCelular = $cita->paciente->PacCel;
                            $mensaje = "Hola, le escribo de la clínica dental para recordarle su cita.";
                            $urlWhatsApp = "https://api.whatsapp.com/send?phone=$numeroCelular&text=" . urlencode($mensaje);
                            echo '<a href="' . $urlWhatsApp . '" target="_blank">' . h($cita->paciente->PacCel) . '</a>';
                        } else {
                            echo 'No disponible';
                        }
                        ?>
                    </td>
                    <td><?= $cita->PacCod === null ? '' : $this->Number->format($cita->PacCod) ?></td>
                    <td><?= $cita->OdoCod === null ? '' : $this->Number->format($cita->OdoCod) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $cita->CitCod], [
                            'class' => 'btn btn-primary',
                            'escape' => false,
                            'title' => 'Ver'
                        ]) ?>
                        <?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $cita->CitCod], [
                            'class' => 'btn btn-primary',
                            'escape' => false,
                            'title' => 'Editar'
                        ]) ?>
                        <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $cita->CitCod], [
                            'class' => 'btn btn-danger',
                            'escape' => false,
                            'title' => 'Eliminar',
                            'confirm' => __('¿Estás seguro de eliminar el registro # {0}?', $cita->CitCod)
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
