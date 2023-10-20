<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoriaClinica $historiaClinica
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="historiaClinica form content">
            <?= $this->Form->create($historiaClinica) ?>
            <fieldset>
                <legend><?= __('Agregar Historia Clinica') ?></legend>
                <?php
                    echo $this->Form->label('Codigo de la Historia Clinica');
                    echo $this->Form->input('HisCliCod', ['type' => 'number', 'min' => 0, 'max' => 99999999]);

                    echo $this->Form->label('Código del Paciente');
                    echo $this->Form->select('PacCod', $opcionesDePacCod);

                    echo $this->Form->label('Código del Odontologo');
                    echo $this->Form->select('OdoCod', $opcionesDeOdoCod);

                    echo $this->Form->label('Código de la Historia Medica');
                    echo $this->Form->select('HisMedCod', $opcionesDeHisMedCod);


                    echo $this->Form->control('HisCliOdoAce', [
                        'label' => 'Aceptación del Odontólogo',
                        // Otros atributos del control
                    ]);

                    echo $this->Form->control('HisCliPacAce', [
                        'label' => 'Aceptación del Paciente',
                        // Otros atributos del control
                    ]);

                    echo $this->Form->control('HisCliAno', [
                        'label' => 'Año de la Historia Clínica',
                        // Otros atributos del control
                    ]);

                    echo $this->Form->control('HisCliMes', [
                        'label' => 'Mes de la Historia Clínica',
                        // Otros atributos del control
                    ]);

                    echo $this->Form->control('HisCliDia', [
                        'label' => 'Día de la Historia Clínica',
                        // Otros atributos del control
                    ]);


                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['id' => 'cancelButton', 'class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
