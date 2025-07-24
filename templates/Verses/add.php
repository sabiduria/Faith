<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verse $verse
 * @var \Cake\Collection\CollectionInterface|string[] $sermons
 */
$this->set('title_2', 'Verses');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($verse) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('sermon_id', ['options' => $sermons, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'sermon_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'title']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'description']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
