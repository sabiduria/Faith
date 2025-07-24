<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Following $following
 * @var \Cake\Collection\CollectionInterface|string[] $members
 */
$this->set('title_2', 'Followings');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($following) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('member_id', ['options' => $members, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'member_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church', ['class' => 'form-control', 'label' => 'church']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('following_date', ['empty' => true, 'class' => 'form-control', 'label' => 'following_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('following_status', ['class' => 'form-control', 'label' => 'following_status']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
