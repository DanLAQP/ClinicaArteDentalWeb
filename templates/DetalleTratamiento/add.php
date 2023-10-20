<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleTratamiento $detalleTratamiento
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="detalleTratamiento form content">
            <?= $this->Form->create($detalleTratamiento) ?>
            <fieldset>
                <legend><?= __('Agregar Detalle Tratamiento') ?></legend>
                <?php
                    echo $this->Form->label('Código del Detalle');
                    echo $this->Form->input('DetTraCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);
                    echo $this->Form->label('Codigo de Tratamiento');
                    echo $this->Form->select('TraCod', $opcionesDeTraCod);
                    echo $this->Form->control('DetTraCan', ['label' => 'Cantidad']);
                    echo $this->Form->control('DetTraCosUni', ['label' => 'Costo Unitario']);
                    echo $this->Form->select('DetTraEst', [
                        'En Espera' => 'En Espera',
                        'Completado' => 'Completado',
                        'Cancelado' => 'Cancelado',
                        'Pendiente' => 'Pendiente',
                        'En revisión' => 'En revisión'
                    ], ['label' => 'Estado del Tratamiento']);
                    echo $this->Form->control('DetTraDes', ['label' => 'Descripcion']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
