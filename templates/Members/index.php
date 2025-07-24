<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Member> $members
 */
$this->set('title_2', 'Members');
$Number = 1;
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <button class="btn btn-sm btn-primary-light mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#NewItem" aria-controls="NewItem"><i class="fa-thin fa-plus"></i> Ajouter</button>
    <?= $this->Html->link(__('Nouveau Member'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm mb-3']) ?>
    <div class="table-responsive">
        <table id="scroll-vertical" class="table table-bordered text-nowrap w-100 TableData">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N°') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('church_id') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('department_id') ?></th>
                    <th><?= $this->Paginator->sort('membership_id') ?></th>
                    <th><?= $this->Paginator->sort('reference') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('secondname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('phone1') ?></th>
                    <th><?= $this->Paginator->sort('phone2') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('marital_status') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('birthdate') ?></th>
                    <th><?= $this->Paginator->sort('occupation') ?></th>
                    <th><?= $this->Paginator->sort('membership_date') ?></th>
                    <th><?= $this->Paginator->sort('baptism_status') ?></th>
                    <th><?= $this->Paginator->sort('emergency_contact_name') ?></th>
                    <th><?= $this->Paginator->sort('emergency_contact_phone') ?></th>
                    <th><?= $this->Paginator->sort('member_status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('modifiedby') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member): ?>
                <tr>
                    <td><?= $Number++ ?></td>
                    <td><?= $this->Number->format($member->id) ?></td>
                    <td><?= $member->hasValue('church') ? $this->Html->link($member->church->name, ['controller' => 'Churchs', 'action' => 'view', $member->church->id]) : '' ?></td>
                    <td><?= $member->hasValue('role') ? $this->Html->link($member->role->name, ['controller' => 'Roles', 'action' => 'view', $member->role->id]) : '' ?></td>
                    <td><?= $member->hasValue('department') ? $this->Html->link($member->department->name, ['controller' => 'Departments', 'action' => 'view', $member->department->id]) : '' ?></td>
                    <td><?= $member->hasValue('membership') ? $this->Html->link($member->membership->name, ['controller' => 'Memberships', 'action' => 'view', $member->membership->id]) : '' ?></td>
                    <td><?= h($member->reference) ?></td>
                    <td><?= h($member->firstname) ?></td>
                    <td><?= h($member->secondname) ?></td>
                    <td><?= h($member->lastname) ?></td>
                    <td><?= h($member->gender) ?></td>
                    <td><?= h($member->phone1) ?></td>
                    <td><?= h($member->phone2) ?></td>
                    <td><?= h($member->email) ?></td>
                    <td><?= h($member->marital_status) ?></td>
                    <td><?= h($member->address) ?></td>
                    <td><?= h($member->birthdate) ?></td>
                    <td><?= h($member->occupation) ?></td>
                    <td><?= h($member->membership_date) ?></td>
                    <td><?= h($member->baptism_status) ?></td>
                    <td><?= h($member->emergency_contact_name) ?></td>
                    <td><?= h($member->emergency_contact_phone) ?></td>
                    <td><?= h($member->member_status) ?></td>
                    <td><?= h($member->created) ?></td>
                    <td><?= h($member->modified) ?></td>
                    <td><?= h($member->createdby) ?></td>
                    <td><?= h($member->modifiedby) ?></td>
                    <td><?= h($member->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $member->id], ['class' => 'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $member->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $member->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="NewItem"
     aria-labelledby="offcanvasRightLabel1">
    <div class="offcanvas-header border-bottom border-block-end-dashed">
        <h5 class="offcanvas-title" id="offcanvasRightLabel1">Nouveau Members</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="row">
            <div id="response"></div>
<div class="mt-3">
    <?= $this->Form->create(null, ['id' => 'DataForm']);?>
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

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#DataForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            // Get form data
            var formData = $(this).serialize();

            // Perform AJAX request
            $.ajax({
                url: '<?= $this->Url->build(["controller" => 'Members', 'action' => 'insert']) ?>',
                method: 'POST',
                data: formData,
                dataType: 'json', // Expecting JSON in the response
                success: function(response) {
                    console.log(response.data); // Log the JSON response
                    $('#response').html('<div class="alert alert-success rounded-pill alert-dismissible fade show mb-1 mt-2">' + response.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button> </div>'); // Show success message
                    var newRow = '<tr>';
                    newRow += '<td>'+''+'</td>'; // Add your actions
                    newRow += '</tr>';

                    // Append the new row to the table
                    $('.TableData tbody').append(newRow);
                    $('#DataForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any error
                    $('#response').html('<p>An error occurred. Please try again.</p>');
                }
            });
        });
    });
</script>