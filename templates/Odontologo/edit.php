<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Odontologo $odontologo
 */
?>
<legend><?= __('Editar Odontologo') ?></legend>
<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($odontologo) ?>
    <?= $this->Form->control('OdoNom', ['label' => __('Odontologo Nombre')]) ?>
    <?= $this->Form->control('OdoFecIngAno', ['label' => __('Odontologo Fecha Ingreso Año')]) ?>
    <?= $this->Form->control('OdoFecIngMes', ['label' => __('Odontologo Fecha Ingreso Mes')]) ?>
    <?= $this->Form->control('OdoFecIngDia', ['label' => __('Odontologo Fecha Ingreso Dia')]) ?>
    <!-- ... -->

    <?= $this->Form->button(__('Actualizar'), ['type' => 'submit']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($odontologo) ?>
    <?= $this->Form->control('OdoNom', ['label' => __('Odontologo Nombre'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdoFecIngMes', ['label' => __('Odontologo Fecha Ingreso Mes'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdoFecIngDia', ['label' => __('Odontologo Fecha Ingreso Dia'), 'disabled' => true]) ?>

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
