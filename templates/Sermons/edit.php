<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sermon $sermon
 * @var \Cake\Collection\CollectionInterface|string[] $topics
 * @var \Cake\Collection\CollectionInterface|string[] $churchs
 */
$this->set('title_2', 'Prédications');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($sermon) ?>
    <div class="row gy-3">
        <div class="col-xl-12">
            <?= $this->Form->control('topic_id', ['options' => $topics, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'Theme']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'Eglise']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('banner', ['type' => 'file', 'class' => 'form-control', 'label' => 'Bannière (Photo)']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'Titre']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('verse', ['class' => 'form-control', 'label' => 'Versets']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('summary', ['class' => 'form-control', 'label' => 'Résumé']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('sermon', ['class' => 'form-control', 'label' => 'Prédications']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('contributor', ['class' => 'form-control', 'label' => 'Contributeur / Pasteur']); ?>
        </div>
    </div>
    <div class="mt-3 mb-3">
        <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
