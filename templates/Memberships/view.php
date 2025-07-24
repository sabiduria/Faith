<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
 $this->set('title_2', 'Memberships');
?>
<div class="row">
    <div class="column column-80">
        <div class="memberships view content">
            <h3><?= h($membership->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($membership->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($membership->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($membership->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($membership->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($membership->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($membership->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $membership->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Members') ?></h4>
                <?php if (!empty($membership->members)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Membership Id') ?></th>
                            <th><?= __('Reference') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Secondname') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Phone1') ?></th>
                            <th><?= __('Phone2') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Marital Status') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Birthdate') ?></th>
                            <th><?= __('Avatar') ?></th>
                            <th><?= __('Occupation') ?></th>
                            <th><?= __('Membership Date') ?></th>
                            <th><?= __('Baptism Status') ?></th>
                            <th><?= __('Emergency Contact Name') ?></th>
                            <th><?= __('Emergency Contact Phone') ?></th>
                            <th><?= __('Member Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($membership->members as $member) : ?>
                        <tr>
                            <td><?= h($member->id) ?></td>
                            <td><?= h($member->church_id) ?></td>
                            <td><?= h($member->role_id) ?></td>
                            <td><?= h($member->department_id) ?></td>
                            <td><?= h($member->membership_id) ?></td>
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
                            <td><?= h($member->avatar) ?></td>
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
                                <?= $this->Html->link(__('Details'), ['controller' => 'Members', 'action' => 'view', $member->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Members', 'action' => 'edit', $member->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Members', 'action' => 'delete', $member->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>