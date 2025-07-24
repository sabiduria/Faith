<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 * @var string[]|\Cake\Collection\CollectionInterface $churchs
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 * @var string[]|\Cake\Collection\CollectionInterface $memberships
 */
$this->set('title_2', 'Members');
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Form->create($member) ?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('role_id', ['options' => $roles, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'role_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('department_id', ['options' => $departments, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'department_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('membership_id', ['options' => $memberships, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'membership_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('reference', ['class' => 'form-control', 'label' => 'reference']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('firstname', ['class' => 'form-control', 'label' => 'firstname']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('secondname', ['class' => 'form-control', 'label' => 'secondname']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('lastname', ['class' => 'form-control', 'label' => 'lastname']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('gender', ['class' => 'form-control', 'label' => 'gender']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('phone1', ['class' => 'form-control', 'label' => 'phone1']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('phone2', ['class' => 'form-control', 'label' => 'phone2']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'email']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('marital_status', ['class' => 'form-control', 'label' => 'marital_status']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('address', ['class' => 'form-control', 'label' => 'address']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('birthdate', ['empty' => true, 'class' => 'form-control', 'label' => 'birthdate']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('avatar', ['class' => 'form-control', 'label' => 'avatar']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('occupation', ['class' => 'form-control', 'label' => 'occupation']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('membership_date', ['empty' => true, 'class' => 'form-control', 'label' => 'membership_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('baptism_status', ['class' => 'form-control', 'label' => 'baptism_status']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('emergency_contact_name', ['class' => 'form-control', 'label' => 'emergency_contact_name']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('emergency_contact_phone', ['class' => 'form-control', 'label' => 'emergency_contact_phone']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('member_status', ['class' => 'form-control', 'label' => 'member_status']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
