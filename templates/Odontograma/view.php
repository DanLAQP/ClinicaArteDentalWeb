<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Odontograma $odontograma
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Odontograma'), ['action' => 'edit', $odontograma->OdxCod], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Odontograma'), ['action' => 'delete', $odontograma->OdxCod], ['confirm' => __('Esta seguro de Eliminar el registro # {0}?', $odontograma->OdxCod), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Odontogramas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nuevo Odontograma'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="odontograma view content">
            <h3><?= h($odontograma->OdxCod) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estado de Registro') ?></th>
                    <td><?= h($odontograma->EstReg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actalizacion') ?></th>
                    <td><?= h($odontograma->CarFlaAct) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo de Odontograma') ?></th>
                    <td><?= $this->Number->format($odontograma->OdxCod) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo de Historia Clinica') ?></th>
                    <td><?= $this->Number->format($odontograma->HisCliCod) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
