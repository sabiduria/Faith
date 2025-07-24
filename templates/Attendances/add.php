<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 * @var \Cake\Collection\CollectionInterface|string[] $members
 */
$this->set('title_2', 'Attendances');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($attendance) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('member_id', ['options' => $members, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'member_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('attendance_type', ['class' => 'form-control', 'label' => 'attendance_type']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
