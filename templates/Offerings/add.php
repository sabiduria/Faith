<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offering $offering
 * @var \Cake\Collection\CollectionInterface|string[] $services
 * @var \Cake\Collection\CollectionInterface|string[] $offeringstypes
 * @var \Cake\Collection\CollectionInterface|string[] $currencies
 */
$this->set('title_2', 'Offerings');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($offering) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('service_id', ['options' => $services, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'service_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('service_date', ['empty' => true, 'class' => 'form-control', 'label' => 'service_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('offeringstype_id', ['options' => $offeringstypes, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'offeringstype_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'amount']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'currency_id']); ?>
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
