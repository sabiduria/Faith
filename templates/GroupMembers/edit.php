<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GroupMember $groupMember
 * @var string[]|\Cake\Collection\CollectionInterface $churchGroups
 * @var string[]|\Cake\Collection\CollectionInterface $churchs
 */
$this->set('title_2', 'Group Members');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($groupMember) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('church_group_id', ['options' => $churchGroups, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_group_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('approved', ['class' => 'form-control', 'label' => 'approved']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
