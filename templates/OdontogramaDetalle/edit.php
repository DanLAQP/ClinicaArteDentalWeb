<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OdontogramaDetalle $odontogramaDetalle
 */
?>
<legend><?= __('Editar Odontograma Detalle') ?></legend>
<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($odontogramaDetalle) ?>
    <?= $this->Form->control('OdxDetNum', ['label' => __('Odontograma Detalle Numero')]) ?>
    <?= $this->Form->control('OdxDetNumDie', ['label' => __('Odontograma Detalle Numero Diente')]) ?>
    <?= $this->Form->control('OdxDetVes', ['label' => __('Odontograma Detalle Vestibular?')]) ?>
    <?= $this->Form->control('OdxDetPal', ['label' => __('Odontograma Detalle Palatino?')]) ?>
    <?= $this->Form->control('OdxDetLin', ['label' => __('Odontograma Detalle Lingual?')]) ?>
    <?= $this->Form->control('OdxDetDer', ['label' => __('Odontograma Detalle Derecho?')]) ?>
    <?= $this->Form->control('OdxDetIzq', ['label' => __('Odontograma Detalle Izquierdo?')]) ?>
    <?= $this->Form->control('OdxDetDes', ['label' => __('Odontograma Detalle Descripcion')]) ?>
    <!-- ... -->

    <?= $this->Form->button(__('Actualizar'), ['type' => 'submit']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($odontogramaDetalle) ?>
    <?= $this->Form->control('OdxDetNum', ['label' => __('Odontograma Detalle Numero'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdxDetNumDie', ['label' => __('Odontograma Detalle Numero Diente'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdxDetVes', ['label' => __('Odontograma Detalle Vestibular?'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdxDetPal', ['label' => __('Odontograma Detalle Palatino?'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdxDetLin', ['label' => __('Odontograma Detalle Lingual?'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdxDetDer', ['label' => __('Odontograma Detalle Derecho?'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdxDetIzq', ['label' => __('Odontograma Detalle Izquierdo?'), 'disabled' => true]) ?>
    <?= $this->Form->control('OdxDetDes', ['label' => __('Odontograma Detalle Descripcion'), 'disabled' => true]) ?>
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
