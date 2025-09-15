<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offering $offering
 * @var \Cake\Collection\CollectionInterface|string[] $services
 * @var \Cake\Collection\CollectionInterface|string[] $offeringstypes
 * @var \Cake\Collection\CollectionInterface|string[] $currencies
 */
$this->set('title_2', 'Offrandes');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($offering) ?>
        <div class="row gy-2">
            <div class="col-xl-6">
                <?= $this->Form->control('service_id', ['options' => $services, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'Service']); ?>
            </div>
            <div class="col-xl-6">
                <?= $this->Form->control('service_date', ['empty' => true, 'class' => 'form-control', 'label' => 'Date du service']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('offeringstype_id', ['options' => $offeringstypes, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'Type']); ?>
            </div>
            <div class="col-xl-9">
                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'Montant']); ?>
            </div>
            <div class="col-xl-3">
                <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'Devise']); ?>
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
