<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 * @var \Cake\Collection\CollectionInterface|string[] $churchs
 */
$this->set('title_2', 'Reports');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($report) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'title']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('summary', ['class' => 'form-control', 'label' => 'summary']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('status', ['class' => 'form-control', 'label' => 'status']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
