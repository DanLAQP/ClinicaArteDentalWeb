<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoriaMedica $historiaMedica
 */
?>
<legend><?= __('Editar Historia Medica') ?></legend>
<?php if ($flagToUpdate): ?>
    <!-- Campos editables -->
    <?= $this->Form->create($historiaMedica) ?>
    <?= $this->Form->control('HisMedProCar', ['label' => __('Problemas Cardíacos')]) ?>
    <?= $this->Form->control('HisMedDia', ['label' => __('Diabetes')]) ?>
    <?= $this->Form->control('HisMedEnfRen', ['label' => __('Enfermedad Renal')]) ?>
    <?= $this->Form->control('HisMedEpi', ['label' => __('Epilepsia')]) ?>
    <?= $this->Form->control('HisMedHip', ['label' => __('Hipertensión')]) ?>
    <?= $this->Form->control('HisMedVIH', ['label' => __('VIH')]) ?>
    <?= $this->Form->control('HisMedHep', ['label' => __('Hepatitis')]) ?>
    <?= $this->Form->control('HisMedPro', ['label' => __('Problemas Respiratorios')]) ?>
    <?= $this->Form->control('HisMedAle', ['label' => __('Alergias')]) ?>
    <?= $this->Form->control('HisMedProCoa', ['label' => __('Problemas de Coagulación')]) ?>
    <?= $this->Form->control('HisMedTomMed', ['label' => __('Toma de Medicamentos')]) ?>
    <?= $this->Form->control('HisMedEmb', ['label' => __('Embarazo')]) ?>
    <?= $this->Form->control('HisMedProTraDen', ['label' => __('Problemas Traumáticos Dentales')]) ?>
    <?= $this->Form->control('HisMedHab', ['label' => __('Hábitos')]) ?>
    <?= $this->Form->control('HisMedEsp', ['label' => __('Específicos')]) ?>
    <!-- ... -->

    <?= $this->Form->button(__('Actualizar'), ['type' => 'submit']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>

    <?= $this->Form->end() ?>

<?php else: ?>
    <!-- Campos deshabilitados -->
    <?= $this->Form->create($historiaMedica) ?>
    <?= $this->Form->control('HisMedProCar', ['label' => __('Problemas Cardíacos'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedDia', ['label' => __('Diabetes'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedEnfRen', ['label' => __('Enfermedad Renal'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedEpi', ['label' => __('Epilepsia'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedHip', ['label' => __('Hipertensión'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedVIH', ['label' => __('VIH'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedHep', ['label' => __('Hepatitis'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedPro', ['label' => __('Problemas Respiratorios'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedAle', ['label' => __('Alergias'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedProCoa', ['label' => __('Problemas de Coagulación'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedTomMed', ['label' => __('Toma de Medicamentos'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedEmb', ['label' => __('Embarazo'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedProTraDen', ['label' => __('Problemas Traumáticos Dentales'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedHab', ['label' => __('Hábitos'), 'disabled' => true]) ?>
    <?= $this->Form->control('HisMedEsp', ['label' => __('Específicos'), 'disabled' => true]) ?>
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
