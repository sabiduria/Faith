<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer $answer
 * @var \Cake\Collection\CollectionInterface|string[] $comments
 */
$this->set('title_2', 'Answers');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($answer) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('comment_id', ['options' => $comments, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'comment_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'email']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('answer', ['class' => 'form-control', 'label' => 'answer']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
