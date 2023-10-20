<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Paciente> $paciente
 */
?>
<div class="paciente index content">
<?= $this->Html->link(__('Nuevo Paciente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <h3><?= __('Paciente') ?></h3>

<?= $this->Form->create(null, ['url' => ['action' => 'index']]) ?>
<?= $this->Form->input('nombre', [
    'label' => 'Nombre',
    'placeholder' => 'Ingrese el nombre...',
    'style' => 'margin-left: 10px; max-width: 150px; height: 35px;', // Añade un margen izquierdo de 10px y fija el alto a 35px
    'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+', // Expresión regular para validar letras, incluyendo espacios
    'title' => 'Ingrese solo letras', // Mensaje de validación
]) ?>


<?= $this->Form->input('dni', [
    'label' => 'DNI',
    'placeholder' => 'Ingrese el DNI...',
    'style' => 'margin-left: 10px; max-width: 150px; height: 35px;', // Añade un margen izquierdo de 10px, limita el ancho a 150px y fija el alto a 50px
    'type' => 'number', // Indica que el campo aceptará solo números
    'min' => 1, // Asegura que solo se ingresen números positivos
    'step' => 1, // Incremento mínimo de 1 (evita números decimales)
    'maxlength' => 8, // Limita la longitud máxima a 8 caracteres
]) ?>



<?= $this->Form->button('Buscar', ['style' => 'margin-left: 10px;']) ?>


<?= $this->Form->end() ?>



    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                <th><?= $this->Paginator->sort('PacCod', 'Código del Paciente') ?></th>
                <th><?= $this->Paginator->sort('PacNom', 'Nombre') ?></th>
<th><?= $this->Paginator->sort('PacDir', 'Dirección') ?></th>
<th><?= $this->Paginator->sort('PacAnoNac', 'Año de Nacimiento') ?></th>
<th><?= $this->Paginator->sort('PacCel', 'Celular') ?></th>
<th><?= $this->Paginator->sort('PacEma', 'Email') ?></th>
<th><?= $this->Paginator->sort('PacDni', 'DNI') ?></th>

<th><?= $this->Paginator->sort('PacOcu', 'Ocupación') ?></th>
<th><?= $this->Paginator->sort('PacRef', 'Referencia') ?></th>
<th><?= $this->Paginator->sort('PacEstReg', 'Estado de Registro') ?></th>
<th><?= $this->Paginator->sort('PacCarFlaAct', 'Actualización') ?></th>
<th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paciente as $paciente): ?>
                <tr>
                    <td><?= $this->Number->format($paciente->PacCod) ?></td>
                    <td><?= h($paciente->PacNom) ?></td>
                    <td><?= h($paciente->PacDir) ?></td>
                    <td><?= $paciente->PacAnoNac === null ? '' : $this->Number->format($paciente->PacAnoNac) ?></td>
                    <td><?= $paciente->PacCel === null ? '' : $this->Number->format($paciente->PacCel) ?></td>
                    <td><?= h($paciente->PacEma) ?></td>
                    <td><?= $paciente->PacDni === null ? '' : $this->Number->format($paciente->PacDni) ?></td>

                    <td><?= h($paciente->PacOcu) ?></td>
                    <td><?= h($paciente->PacRef) ?></td>
                    <td><?= h($paciente->PacEstReg) ?></td>
                    <td><?= h($paciente->PacCarFlaAct) ?></td>
                    <td class="actions">

                        <?= $this->Html->link('<i class="fa-solid fa-eye"></i>', ['action' => 'view', $paciente->PacCod], ['class' => 'btn btn-primary','escape' => false, 'title' => 'Ver']) ?>
                        <?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $paciente->PacCod], ['class' => 'btn btn-primary', 'escape' => false, 'title' => 'Editar']) ?>
                        <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $paciente->PacCod], ['class' => 'btn btn-danger','escape' => false,'title' => 'Eliminar','confirm' => __('Esta seguro de eliminar el registro # {0}?', $paciente->PacCod)]) ?>
                        <?= $this->Form->postLink('<i class="fa-solid fa-toggle-off"></i>', ['action' => 'inactivate', $paciente->PacCod], ['class' => 'btn btn-warning', 'escape' => false, 'title' => 'Inactivar','confirm' => __('Esta seguro de inactivar este registro?')]) ?>
                        <?= $this->Form->postLink('<i class="fa-solid fa-toggle-on"></i>', ['action' => 'reactivate', $paciente->PacCod], ['class' => 'btn btn-success','escape' => false,'title' => 'Reactivar','confirm' => __('Esta seguro de reactivar este registro?')]) ?>
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

