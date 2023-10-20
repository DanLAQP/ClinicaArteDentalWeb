<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetalleTratamiento $detalleTratamiento
 */
?>
<legend><?= __('Editar Detalle Tratamiento') ?></legend>
<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($detalleTratamiento) ?>
    <?= $this->Form->control('DetTraCan', ['label' => __('Cantidad')]) ?>
    <?= $this->Form->control('DetTraCosUni', ['label' => __('Costo Unitario')]) ?>
    <!-- Campo de selección personalizado para Estado del Tratamiento -->
    <div class="input select">
        <?= $this->Form->label('DetTraEst', __('Estado del Tratamiento')) ?>
        <?= $this->Form->select(
            'DetTraEst',
            [
                'En Espera' => 'En Espera',
                'Completado' => 'Completado',
                'Cancelado' => 'Cancelado',
                'Pendiente' => 'Pendiente',
                'En revisión' => 'En revisión'
            ],
            ['empty' => 'Seleccione', 'value' => $detalleTratamiento->DetTraEst]
        ) ?>
    </div>

    <?= $this->Form->control('DetTraDes', ['label' => __('Descripcion')]) ?>
    <!-- ... -->

    <?= $this->Form->button(__('Actualizar'), ['type' => 'submit']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($detalleTratamiento) ?>
    <?= $this->Form->control('DetTraCan', ['label' => __('Cantidad'), 'disabled' => true]) ?>
    <?= $this->Form->control('DetTraCosUni', ['label' => __('Costo Unitario'), 'disabled' => true]) ?>
    <?= $this->Form->control('DetTraEst', ['label' => __('Estado del Tratamiento'), 'disabled' => true]) ?>
    <?= $this->Form->control('DetTraDes', ['label' => __('Descripcion'), 'disabled' => true]) ?>

    <!-- ... -->

    <?= $this->Html->link(__('Salir'), ['action' => 'index'], ['class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php endif; ?>

<!-- JavaScript para limpiar los campos al cancelar -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const cancelButton = document.querySelector('#cancelButton');

    cancelButton.addEventListener('click', () => {
      const form = document.querySelector('form');
      form.reset();
    });
  });
</script>
