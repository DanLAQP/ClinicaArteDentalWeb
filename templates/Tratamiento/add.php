<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tratamiento $tratamiento
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="tratamiento form content">
            <?= $this->Form->create($tratamiento) ?>
            <fieldset>
                <legend><?= __('Agregar Tratamiento') ?></legend>
                <?php
                    echo $this->Form->label('Código del Tratamiento');
                    echo $this->Form->input('TraCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->label('Historia Clinica Codigo');
                    echo $this->Form->select('HisCliCod', $opcionesDeHisCliCod);
                    echo $this->Form->control('TraDes', ['label' => __('Descripcion')]);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

