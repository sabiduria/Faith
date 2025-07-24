<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exchangerate $exchangerate
 */
$this->set('title_2', 'Exchangerates');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($exchangerate) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('currency1', ['class' => 'form-control', 'label' => 'currency1']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('currency2', ['class' => 'form-control', 'label' => 'currency2']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'amount']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church', ['class' => 'form-control', 'label' => 'church']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
