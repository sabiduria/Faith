<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media $media
 * @var \Cake\Collection\CollectionInterface|string[] $sermons
 */
$this->set('title_2', 'Medias');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($media) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('sermon_id', ['options' => $sermons, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'sermon_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'description']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('url', ['class' => 'form-control', 'label' => 'url']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('mediatype', ['class' => 'form-control', 'label' => 'mediatype']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
