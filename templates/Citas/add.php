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
                <legend><?= __('Agregar Cita') ?></legend>
                <?php
                     // al poner esta linea de codigo permito mostrar e ingresar la pk en el formulario
                    echo $this->Form->label('Código de la cita');
                    echo $this->Form->input('CitCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->label('Código del Paciente');
                    echo $this->Form->select('PacCod', $opcionesDePacCod);

                    echo $this->Form->label('Código del Odontologo');
                    echo $this->Form->select('OdoCod', $opcionesDeOdoCod);
                    echo $this->Form->control('CitFecHor', [
                        'label' => 'Fecha y Hora de la Cita',
                        'empty' => true
                    ]);

                ?>

                <div class="input select">
                    <label for="CitEst">Estado de la Cita</label>
                    <select name="CitEst">
                        <option value="Programada">Programada</option>
                        <option value="En Progreso">En Progreso</option>
                        <option value="Completada">Completada</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                </div>

                <div class="input select">
                <label for="Duracion">Duración</label>
                <select name="Duracion">
                <option value="30 min">30 min</option>
                <option value="60 min">60 min</option>
                </select>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
