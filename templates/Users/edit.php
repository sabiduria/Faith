<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->set('title_2', 'Users');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($user) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('lastname', ['class' => 'form-control', 'label' => 'lastname']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'email']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church_reference', ['class' => 'form-control', 'label' => 'church_reference']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('username', ['class' => 'form-control', 'label' => 'username']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('password', ['class' => 'form-control', 'label' => 'password']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('delete', ['class' => 'form-control', 'label' => 'delete']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
