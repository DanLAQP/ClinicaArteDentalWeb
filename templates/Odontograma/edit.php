<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Odontograma $odontograma
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="odontograma form content">
            <?= $this->Form->create($odontograma) ?>
            <fieldset>
                <legend><?= __('Editar Odontograma') ?></legend>

                    <div>No hay campos editables disponibles en este momento.</div>

            </fieldset>
            <?= $this->Html->link('Volver', ['action' => 'index'], ['class' => 'button']) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
