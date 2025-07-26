<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contribution $contribution
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 */
$this->set('title_2', 'Contributions');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($contribution) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('project_id', ['options' => $projects, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'project_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('donator', ['class' => 'form-control', 'label' => 'donator']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('phone', ['class' => 'form-control', 'label' => 'phone']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'amount']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
