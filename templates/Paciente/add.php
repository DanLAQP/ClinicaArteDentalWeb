<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paciente $paciente
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="paciente form content">
            <?= $this->Form->create($paciente) ?>
            <fieldset>
                <legend><?= __('Agregar Paciente') ?></legend>
                <?php
                     // al poner esta linea de codigo permito mostrar e ingresar la pk en el formulario
                    echo $this->Form->label('Código del Paciente');
                    echo $this->Form->input('PacCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->control('PacDir', ['label' => 'Dirección']);
                    echo $this->Form->control('PacAnoNac', ['label' => 'Año de Nacimiento']);
                    echo $this->Form->control('PacCel', ['label' => 'Celular']);
                    echo $this->Form->control('PacEma', ['label' => 'Email']);
                    echo $this->Form->control('PacDni', ['label' => 'DNI']);
                    echo $this->Form->control('PacNom', ['label' => 'Nombre']);
                    echo $this->Form->control('PacOcu', ['label' => 'Ocupación']);
                    echo $this->Form->control('PacRef', ['label' => 'Referencia']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

