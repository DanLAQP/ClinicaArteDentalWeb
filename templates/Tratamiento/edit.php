<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tratamiento $tratamiento
 */
?>
<legend><?= __('Editar Tratamiento') ?></legend>
<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($tratamiento)?>
    <?= $this->Form->control('TraDes', ['label' => __('Descripcion')]) ?>

    <!-- ... -->

    <?= $this->Form->button(__('Actualizar'), ['type' => 'submit']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($tratamiento) ?>
    <?= $this->Form->control('TraDes', ['label' => __('Descripcion'), 'disabled' => true]) ?>

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
