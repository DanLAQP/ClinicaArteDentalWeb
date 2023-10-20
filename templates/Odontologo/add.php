<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Odontologo $odontologo
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="odontologo form content">
            <?= $this->Form->create($odontologo) ?>
            <fieldset>
                <legend><?= __('Agregar Odontologo') ?></legend>
                <?php
                    echo $this->Form->label('Código del Odontologo');
                    echo $this->Form->input('OdoCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->control('OdoNom', ['label' => 'Nombre del Odontologo']);
                    echo $this->Form->control('OdoFecIngAno', ['label' => 'Fecha de Ingreso Año']);
                    echo $this->Form->control('OdoFecIngMes', ['label' => 'Fecha de Ingreso Mes']);
                    echo $this->Form->control('OdoFecIngDia', ['label' => 'Fecha de Ingreso Dia']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
