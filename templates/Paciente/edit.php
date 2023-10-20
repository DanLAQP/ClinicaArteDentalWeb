<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paciente $paciente
 * @var bool $flagToUpdate
 */
?>

<legend><?= __('Editar Paciente') ?></legend>

<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($paciente) ?>
    <?= $this->Form->control('PacNom', ['label' => __('Nombres del Paciente')]) ?>
    <?= $this->Form->control('PacDir', ['label' => __('Direccion')]) ?>
    <?= $this->Form->control('PacEma', ['label' => __('Email')]) ?>
    <?= $this->Form->control('PacDni', ['label' => __('Dni')]) ?>
    <?= $this->Form->control('PacCel', ['label' => __('Celular')]) ?>
    <?= $this->Form->control('PacAnoNac', ['label' => __('Año de nacimiento')]) ?>
    <?= $this->Form->control('PacOcu', ['label' => __('Ocupacion')]) ?>
    <?= $this->Form->control('PacRef', ['label' => __('Referencia')]) ?>
    <!-- ... -->

    <?= $this->Form->button(__('Actualizar'), ['type' => 'submit']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($paciente) ?>
    <?= $this->Form->control('PacNom', ['label' => __('Nombres del Paciente'), 'disabled' => true]) ?>
    <?= $this->Form->control('PacDir', ['label' => __('Direccion'), 'disabled' => true]) ?>
    <?= $this->Form->control('PacEma', ['label' => __('Email'), 'disabled' => true]) ?>
    <?= $this->Form->control('PacDni', ['label' => __('Dni'), 'disabled' => true]) ?>
    <?= $this->Form->control('PacCel', ['label' => __('Celular'), 'disabled' => true]) ?>
    <?= $this->Form->control('PacAnoNac', ['label' => __('Año de nacimiento'), 'disabled' => true]) ?>
    <?= $this->Form->control('PacOcu', ['label' => __('Ocupacion'), 'disabled' => true]) ?>
    <?= $this->Form->control('PacRef', ['label' => __('Referencia'), 'disabled' => true]) ?>
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
