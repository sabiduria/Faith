<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 * @var string[]|\Cake\Collection\CollectionInterface $sermons
 */
$this->set('title_2', 'Comments');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($comment) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('sermon_id', ['options' => $sermons, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'sermon_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'email']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('comment', ['class' => 'form-control', 'label' => 'comment']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
