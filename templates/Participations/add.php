<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participation $participation
 * @var \Cake\Collection\CollectionInterface|string[] $services
 */
$this->set('title_2', 'Participations');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($participation) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('service_id', ['options' => $services, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'service_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('participation_date', ['empty' => true, 'class' => 'form-control', 'label' => 'participation_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('number_people', ['class' => 'form-control', 'label' => 'number_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('male_people', ['class' => 'form-control', 'label' => 'male_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('female_people', ['class' => 'form-control', 'label' => 'female_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('children_people', ['class' => 'form-control', 'label' => 'children_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church', ['class' => 'form-control', 'label' => 'church']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
