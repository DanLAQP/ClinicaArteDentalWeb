<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoriaClinica $historiaClinica
 * @var bool $flagToUpdate
 */
?>


<legend><?= __('Editar Historia Clinica') ?></legend>
<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($historiaClinica) ?>
    <?= $this->Form->control('HisCliOdoAce', ['label' => 'Historia Clínica: Aceptación del Odontólogo']) ?>
    <?= $this->Form->control('HisCliPacAce', ['label' => 'Historia Clínica: Aceptación del Paciente']) ?>
    <?= $this->Form->control('HisCliAno', ['label' => 'Historia Clínica: Año']) ?>
    <?= $this->Form->control('HisCliMes', ['label' => 'Historia Clínica: Mes']) ?>
    <?= $this->Form->control('HisCliDia', ['label' => 'Historia Clínica: Día']) ?>
    <!-- ... -->

    <div class="form-group">
        <?= $this->Form->button('Actualizar', ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
    </div>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($historiaClinica) ?>
    <?= $this->Form->control('HisCliOdoAce', ['label' => 'Historia Clínica: Aceptación del Odontólogo', 'disabled' => true]) ?>
    <?= $this->Form->control('HisCliPacAce', ['label' => 'Historia Clínica: Aceptación del Paciente', 'disabled' => true]) ?>
    <?= $this->Form->control('HisCliAno', ['label' => 'Historia Clínica: Año', 'disabled' => true]) ?>
    <?= $this->Form->control('HisCliMes', ['label' => 'Historia Clínica: Mes', 'disabled' => true]) ?>
    <?= $this->Form->control('HisCliDia', ['label' => 'Historia Clínica: Día', 'disabled' => true]) ?>
    <!-- ... -->

    <div class="form-group">
        <?= $this->Html->link('Salir', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
    </div>

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
