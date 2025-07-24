<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maintenance $maintenance
 * @var \Cake\Collection\CollectionInterface|string[] $equipments
 */
$this->set('title_2', 'Maintenances');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($maintenance) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('equipment_id', ['options' => $equipments, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'equipment_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('problem', ['class' => 'form-control', 'label' => 'problem']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('resolution', ['class' => 'form-control', 'label' => 'resolution']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('expense', ['class' => 'form-control', 'label' => 'expense']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
