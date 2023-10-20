<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OdontogramaDetalle $odontogramaDetalle
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="odontogramaDetalle form content">
            <?= $this->Form->create($odontogramaDetalle) ?>
            <fieldset>
                <legend><?= __('Agregar Odontograma Detalle') ?></legend>
                <?php
                    echo $this->Form->label('Codigo del Detalle del Odontrograma');
                    echo $this->Form->input('OdxDetCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->label(' Codigo del Odontograma');
                    echo $this->Form->select('OdxCod', $opcionesDeOdxCod);
                    echo $this->Form->control('OdxDetNum', ['label' => 'Numero de Detalle']);
                    echo $this->Form->control('OdxDetNumDie', ['label' => 'Numero de Diente']);
                    echo $this->Form->control('OdxDetVes', ['label' => '¿Vestibular?']);
                    echo $this->Form->control('OdxDetPal', ['label' => '¿Palatino?']);
                    echo $this->Form->control('OdxDetLin', ['label' => '¿Lingual?']);
                    echo $this->Form->control('OdxDetDer', ['label' => '¿Derecha?']);
                    echo $this->Form->control('OdxDetIzq', ['label' => '¿Izquierdo?']);
                    echo $this->Form->control('OdxDetDes', ['label' => 'Descripcion']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

