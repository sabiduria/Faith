<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Church $church
 * @var string[]|\Cake\Collection\CollectionInterface $denominations
 */
$this->set('title_2', 'Churchs');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($church) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('reference', ['class' => 'form-control', 'label' => 'reference']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('denomination_id', ['options' => $denominations, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'denomination_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'description']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('address', ['class' => 'form-control', 'label' => 'address']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('phone1', ['class' => 'form-control', 'label' => 'phone1']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('phone2', ['class' => 'form-control', 'label' => 'phone2']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'email']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('website', ['class' => 'form-control', 'label' => 'website']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
