<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $churchs
 */
$this->set('title_2', 'Projets');
$emptyText = "Veuillez selectionner";
$status = ["En cours" => "En cours", "Terminé" => "Terminé", "Annulé" => "Annulé", "En attente" => "En attente", "Prévu" => "Prévu"];
?>
<div class="mt-3">
    <?= $this->Form->create($project) ?>
    <div class="row gy-2">
        <div class="col-xl-12">
            <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'Titre']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'Description']); ?>
        </div>
        <div class="col-xl-6">
            <?= $this->Form->control('start_date', ['empty' => true, 'class' => 'form-control', 'label' => 'Date debut']); ?>
        </div>
        <div class="col-xl-6">
            <?= $this->Form->control('end_date', ['empty' => true, 'class' => 'form-control', 'label' => 'Date fin']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'Eglise']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'Montant']); ?>
        </div>
        <div class="col-xl-12">
            <?= $this->Form->control('project_status', ['options' => $status, 'class' => 'form-select', 'label' => 'Status']); ?>
        </div>
    </div>
    <div class="mt-3 mb-3">
        <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
