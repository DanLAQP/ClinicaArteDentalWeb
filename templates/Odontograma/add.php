<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Odontograma $odontograma
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="odontograma form content">
            <?= $this->Form->create($odontograma) ?>
            <fieldset>
                <legend><?= __('Agregar Odontograma') ?></legend>
                <?php

                    echo $this->Form->label('Odontograma Codigo');
                    echo $this->Form->input('OdxCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->label('Historia Clinica Codigo');
                    echo $this->Form->select('HisCliCod', $opcionesDeHisCliCod);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


