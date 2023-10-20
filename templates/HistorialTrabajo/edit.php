<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistorialTrabajo $historialTrabajo
 */
?>
<legend><?= __('Editar Historial Trabajo') ?></legend>
<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($historialTrabajo) ?>
    <?= $this->Form->control('HisTraFecAno', ['label' => __('Historia Trabajo Fecha Ano')]) ?>
    <?= $this->Form->control('HisTraFecMes', ['label' => __('Historia Trabajo Fecha Mes')]) ?>
    <?= $this->Form->control('HisTraFecDia', ['label' => __('Historia Trabajo Fecha Dia')]) ?>
    <?= $this->Form->control('HisTraLab', ['label' => __('Historia Trabajo Lab?')]) ?>
    <?= $this->Form->control('HisTraDocNom', ['label' => __('Historia Trabajo Doctor Nombre')]) ?>
    <?= $this->Form->control('HisTraTra', ['label' => __('Historia Trabajo Tratamiento?')]) ?>
    <?= $this->Form->control('HisTraAcu', ['label' => __('Historia Trabajo Acu?')]) ?>
    <?= $this->Form->control('HisTraSal', ['label' => __('Historia Trabajo Salario')]) ?>
    <?= $this->Form->control('HisTraFirPac', ['label' => __('Historia Trabajo Firma Paciente')]) ?>
    <?= $this->Form->control('HisTraObs', ['label' => __('Historia Trabajo Observacion')]) ?>

    <!-- ... -->

    <?= $this->Form->button(__('Actualizar'), ['type' => 'submit']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($historialTrabajo) ?>
    <?= $this->Form->control('HisTraFecAno', ['label' => __('Historia Trabajo Fecha Ano'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraFecMes', ['label' => __('Historia Trabajo Fecha Mes'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraFecDia', ['label' => __('Historia Trabajo Fecha Dia'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisCliMes', ['label' => __('Historia Cliente Mes'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisCliDia', ['label' => __('Historia Cliente Dia'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraLab', ['label' => __('Historia Trabajo Lab'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraDocNom', ['label' => __('Historia Trabajo Doctor Nombre'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraTra', ['label' => __('Historia Trabajo Tratamiento?'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraAcu', ['label' => __('Historia Trabajo Acu?'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraSal', ['label' => __('Historia Trabajo Salario?'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraFirPac', ['label' => __('Historia Trabajo Firma Paciente'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisTraObs', ['label' => __('Historia Trabajo Observacion'), 'disabled' => true]) ?>

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
