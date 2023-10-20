<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoriaMedica $historiaMedica
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="historiaMedica form content">
            <?= $this->Form->create($historiaMedica) ?>
            <fieldset>
                <legend><?= __('Agregar Historia Medica') ?></legend>
                <?php
                    echo $this->Form->label('Codigo de la Historia Medica');
                    echo $this->Form->input('HisMedCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);

                    echo $this->Form->control('HisMedProCar', ['label' => __('Problemas Cardíacos')]);
                    echo $this->Form->control('HisMedDia', ['label' => __('Diabetes')]);
                    echo $this->Form->control('HisMedEnfRen', ['label' => __('Enfermedad Renal')]);
                    echo $this->Form->control('HisMedEpi', ['label' => __('Epilepsia')]);
                    echo $this->Form->control('HisMedHip', ['label' => __('Hipertensión')]);
                    echo $this->Form->control('HisMedHep', ['label' => __('Hepatitis')]);
                    echo $this->Form->control('HisMedVIH', ['label' => __('VIH / SIDA')]);
                    echo $this->Form->control('HisMedAle', ['label' => __('Alergias')]);
                    echo $this->Form->control('HisMedPro', ['label' => __('Problemas Respiratorios')]);
                    echo $this->Form->control('HisMedTomMed', ['label' => __('Tomando Medicamentos')]);
                    echo $this->Form->control('HisMedProCoa', ['label' => __('Problemas de Coagulación')]);
                    echo $this->Form->control('HisMedProTraDen', ['label' => __('Problemas de Tratamiento Dental')]);
                    echo $this->Form->control('HisMedEmb', ['label' => __('Embarazo')]);
                    echo $this->Form->control('HisMedEsp', ['label' => __('Otras Especificaciones')]);
                    echo $this->Form->control('HisMedHab', ['label' => __('Hábitos')]);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
