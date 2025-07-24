<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 * @var string[]|\Cake\Collection\CollectionInterface $transactionTypes
 * @var string[]|\Cake\Collection\CollectionInterface $churchs
 * @var string[]|\Cake\Collection\CollectionInterface $currencies
 */
$this->set('title_2', 'Transactions');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($transaction) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('transaction_type_id', ['options' => $transactionTypes, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'transaction_type_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'amount']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('transaction_date', ['empty' => true, 'class' => 'form-control', 'label' => 'transaction_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('donator', ['class' => 'form-control', 'label' => 'donator']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'description']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'currency_id']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
