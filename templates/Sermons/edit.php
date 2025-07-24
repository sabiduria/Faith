<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sermon $sermon
 * @var string[]|\Cake\Collection\CollectionInterface $topics
 * @var string[]|\Cake\Collection\CollectionInterface $churchs
 */
$this->set('title_2', 'Sermons');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($sermon) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('topic_id', ['options' => $topics, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'topic_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('banner', ['class' => 'form-control', 'label' => 'banner']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'title']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('verse', ['class' => 'form-control', 'label' => 'verse']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('summary', ['class' => 'form-control', 'label' => 'summary']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('sermon', ['class' => 'form-control', 'label' => 'sermon']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('contributor', ['class' => 'form-control', 'label' => 'contributor']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
