<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\HistoriaMedica> $historiaMedica
 */
?>
<div class="historiaMedica index content">
    <?= $this->Html->link(__('Nueva Historia Medica'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Historia Medica') ?></h3>

    <?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
<?= $this->Form->input('HisMedCod', [
    'label' => 'HisMedCod',
    'placeholder' => 'Codigo de la HM...',
    'style' => 'margin-left: 10px; max-width: 200px; height: 35px;', // Añade un margen izquierdo de 10px y limita el ancho a 350px
    'type' => 'number', // Indica que el campo aceptará solo números
    'maxlength' => 8, // Limita la longitud máxima a 8 caracteres
    'min' => 1, // Asegura que solo se ingresen números positivos
    'step' => 1,
]) ?>

<?= $this->Form->button('Buscar', ['style' => 'margin-left: 10px;']) ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                <th><?= $this->Paginator->sort('HisMedCod', __('Código de Historia Médica')) ?></th>
                <th><?= $this->Paginator->sort('HisMedProCar', __('Problemas Cardíacos')) ?></th>
                <th><?= $this->Paginator->sort('HisMedEnfRen', __('Enfermedades Renales')) ?></th>
                <th><?= $this->Paginator->sort('HisMedDia', __('Diabetes')) ?></th>
                <th><?= $this->Paginator->sort('HisMedHip', __('Hipertensión')) ?></th>
                <th><?= $this->Paginator->sort('HisMedEpi', __('Epilepsia')) ?></th>
                <th><?= $this->Paginator->sort('HisMedVIH', __('VIH')) ?></th>
                <th><?= $this->Paginator->sort('HisMedHep', __('Hepatitis')) ?></th>
                <th><?= $this->Paginator->sort('HisMedPro', __('Problemas Respiratorios')) ?></th>
                <th><?= $this->Paginator->sort('HisMedAle', __('Alergias')) ?></th>
                <th><?= $this->Paginator->sort('HisMedProCoa', __('Problemas de Coagulación')) ?></th>
                <th><?= $this->Paginator->sort('HisMedTomMed', __('Toma de Medicamentos')) ?></th>
                <th><?= $this->Paginator->sort('HisMedEmb', __('Embarazo')) ?></th>
                <th><?= $this->Paginator->sort('HisMedProTraDen', __('Problemas Traumáticos Dentales')) ?></th>
                <th><?= $this->Paginator->sort('HisMedHab', __('Hábitos')) ?></th>
                <th><?= $this->Paginator->sort('HisMedEsp', __('Específicos')) ?></th>
                <th><?= $this->Paginator->sort('EstReg', __('Estado de Registro')) ?></th>
                <th><?= $this->Paginator->sort('CarFlaAct', __('Actualizacion')) ?></th>
                <th class="actions"><?= __('Acciones') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($historiaMedica as $historiaMedica): ?>
                <tr>
                    <td><?= $this->Number->format($historiaMedica->HisMedCod) ?></td>
                    <td><?= h($historiaMedica->HisMedProCar) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedEnfRen) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedDia) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedHip) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedEpi) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedVIH) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedHep) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedPro) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedAle) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedProCoa) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedTomMed) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedEmb) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedProTraDen) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedHab) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->HisMedEsp) ? __('Sí') : __('No'); ?></td>
                    <td><?= h($historiaMedica->EstReg) ?></td>
                    <td><?= h($historiaMedica->CarFlaAct) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $historiaMedica->HisMedCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Ver'
]) ?>
<?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $historiaMedica->HisMedCod], [
    'class' => 'btn btn-primary',
    'escape' => false,
    'title' => 'Editar'
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $historiaMedica->HisMedCod], [
    'class' => 'btn btn-danger',
    'escape' => false,
    'title' => 'Eliminar',
    'confirm' => __('¿Estás seguro de eliminar el registro # {0}?', $historiaMedica->HisMedCod)
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $historiaMedica->HisMedCod], [
    'class' => 'btn btn-warning',
    'escape' => false,
    'title' => 'Inactivar',
    'confirm' => __('¿Estás seguro de inactivar este registro?')
]) ?>
<?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $historiaMedica->HisMedCod], [
    'class' => 'btn btn-success',
    'escape' => false,
    'title' => 'Reactivar',
    'confirm' => __('¿Estás seguro de reactivar este registro?')
]) ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primer')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, que muestra {{current}} registros de un total de {{count}}')) ?></p>
    </div>
    <?= $this->Html->link('Mostrar Todos los registros', ['action' => 'index'], ['class' => 'button', 'style' => 'display: block; text-align: center; margin: 20px auto;']) ?>
</div>
