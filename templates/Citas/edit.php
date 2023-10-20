<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cita $cita
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="citas form content">
            <?= $this->Form->create($cita) ?>
            <fieldset>
                <legend><?= __('Editar Cita') ?></legend>
                <?php
                    echo $this->Form->control('CitFecHor', [
                        'empty' => true,
                        'label' => 'Fecha y Hora de la Cita'
                    ]);
                ?>

                <div class="input select">
                    <?= $this->Form->label('Duracion', 'Duración') ?>
                    <?= $this->Form->select('Duracion', ['30 min' => '30 min', '60 min' => '60 min'], ['default' => $cita->Duracion]) ?>
                </div>

                <div class="input select">
                    <?= $this->Form->label('CitEst', 'Estado de la Cita') ?>
                    <?= $this->Form->select('CitEst', ['Programada' => 'Programada', 'En Progreso' => 'En Progreso', 'Completada' => 'Completada', 'Cancelada' => 'Cancelada'], ['default' => $cita->CitEst]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Actualizar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
