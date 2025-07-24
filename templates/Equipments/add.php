<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipment $equipment
 * @var \Cake\Collection\CollectionInterface|string[] $churchs
 */
$this->set('title_2', 'Equipments');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($equipment) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('notes', ['class' => 'form-control', 'label' => 'notes']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('price', ['class' => 'form-control', 'label' => 'price']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('equipment_status', ['class' => 'form-control', 'label' => 'equipment_status']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('acquisition_date', ['empty' => true, 'class' => 'form-control', 'label' => 'acquisition_date']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
