<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var string[]|\Cake\Collection\CollectionInterface $churchs
 */
$this->set('title_2', 'Projects');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($project) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'title']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'description']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('start_date', ['empty' => true, 'class' => 'form-control', 'label' => 'start_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('end_date', ['empty' => true, 'class' => 'form-control', 'label' => 'end_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'amount']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('project_status', ['class' => 'form-control', 'label' => 'project_status']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('is_active', ['class' => 'form-control', 'label' => 'is_active']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
