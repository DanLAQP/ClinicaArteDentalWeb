<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistorialTrabajo $historialTrabajo
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="historialTrabajo form content">
            <?= $this->Form->create($historialTrabajo) ?>
            <fieldset>
                <legend><?= __('Agregar Historial Trabajo') ?></legend>
                <?php
                    echo $this->Form->label('Historia Trabajo Codigo');
                    echo $this->Form->input('HisTraCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->label('Historia Clinica Codigo');
                    echo $this->Form->select('HisCliCod', $opcionesDeHisCliCod);
                    echo $this->Form->control('HisTraFecAno', ['label'=>'Historia Trabajo Fecha Año']);
                    echo $this->Form->control('HisTraFecMes', ['label'=>'Historia Trabajo Fecha Mes']);
                    echo $this->Form->control('HisTraFecDia', ['label'=>'Historia Trabajo Fecha Dia']);
                    echo $this->Form->control('HisTraLab', ['label'=>'Historia Trabajo Lab?']);
                    echo $this->Form->control('HisTraDocNom', ['label'=>'Historia Trabajo Doctor Nombre']);
                    echo $this->Form->control('HisTraTra', ['label'=>'Historia Trabajo Tratamiento?']);
                    echo $this->Form->control('HisTraAcu', ['label'=>'Historia Trabajo A cuenta']);
                    echo $this->Form->control('HisTraSal', ['label'=>'Historia Trabajo Saldo']);
                    echo $this->Form->control('HisTraFirPac', ['label'=>'Historia Trabajo Firma Paciente']);
                    echo $this->Form->control('HisTraObs', ['label'=>'Historia Trabajo Observacion']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
