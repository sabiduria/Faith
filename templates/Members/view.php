<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
 $this->set('title_2', 'Members');
?>
<div class="row">
    <div class="column column-80">
        <div class="members view content">
            <h3><?= h($member->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $member->hasValue('church') ? $this->Html->link($member->church->name, ['controller' => 'Churchs', 'action' => 'view', $member->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $member->hasValue('role') ? $this->Html->link($member->role->name, ['controller' => 'Roles', 'action' => 'view', $member->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= $member->hasValue('department') ? $this->Html->link($member->department->name, ['controller' => 'Departments', 'action' => 'view', $member->department->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Membership') ?></th>
                    <td><?= $member->hasValue('membership') ? $this->Html->link($member->membership->name, ['controller' => 'Memberships', 'action' => 'view', $member->membership->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Reference') ?></th>
                    <td><?= h($member->reference) ?></td>
                </tr>
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($member->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Secondname') ?></th>
                    <td><?= h($member->secondname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($member->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($member->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone1') ?></th>
                    <td><?= h($member->phone1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone2') ?></th>
                    <td><?= h($member->phone2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($member->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marital Status') ?></th>
                    <td><?= h($member->marital_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($member->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Occupation') ?></th>
                    <td><?= h($member->occupation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Emergency Contact Name') ?></th>
                    <td><?= h($member->emergency_contact_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Emergency Contact Phone') ?></th>
                    <td><?= h($member->emergency_contact_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($member->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($member->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($member->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birthdate') ?></th>
                    <td><?= h($member->birthdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Membership Date') ?></th>
                    <td><?= h($member->membership_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($member->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($member->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Baptism Status') ?></th>
                    <td><?= $member->baptism_status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Member Status') ?></th>
                    <td><?= $member->member_status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $member->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Avatar') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($member->avatar)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Attendances') ?></h4>
                <?php if (!empty($member->attendances)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Attendance Type') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($member->attendances as $attendance) : ?>
                        <tr>
                            <td><?= h($attendance->id) ?></td>
                            <td><?= h($attendance->member_id) ?></td>
                            <td><?= h($attendance->attendance_type) ?></td>
                            <td><?= h($attendance->created) ?></td>
                            <td><?= h($attendance->modified) ?></td>
                            <td><?= h($attendance->createdby) ?></td>
                            <td><?= h($attendance->modifiedby) ?></td>
                            <td><?= h($attendance->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Attendances', 'action' => 'view', $attendance->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Attendances', 'action' => 'edit', $attendance->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Attendances', 'action' => 'delete', $attendance->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Followings') ?></h4>
                <?php if (!empty($member->followings)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Church') ?></th>
                            <th><?= __('Following Date') ?></th>
                            <th><?= __('Following Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($member->followings as $following) : ?>
                        <tr>
                            <td><?= h($following->id) ?></td>
                            <td><?= h($following->member_id) ?></td>
                            <td><?= h($following->church) ?></td>
                            <td><?= h($following->following_date) ?></td>
                            <td><?= h($following->following_status) ?></td>
                            <td><?= h($following->created) ?></td>
                            <td><?= h($following->modified) ?></td>
                            <td><?= h($following->createdby) ?></td>
                            <td><?= h($following->modifiedby) ?></td>
                            <td><?= h($following->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Followings', 'action' => 'view', $following->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Followings', 'action' => 'edit', $following->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Followings', 'action' => 'delete', $following->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Likes') ?></h4>
                <?php if (!empty($member->likes)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sermon Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($member->likes as $like) : ?>
                        <tr>
                            <td><?= h($like->id) ?></td>
                            <td><?= h($like->sermon_id) ?></td>
                            <td><?= h($like->member_id) ?></td>
                            <td><?= h($like->created) ?></td>
                            <td><?= h($like->modified) ?></td>
                            <td><?= h($like->createdby) ?></td>
                            <td><?= h($like->modifiedby) ?></td>
                            <td><?= h($like->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Likes', 'action' => 'view', $like->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Likes', 'action' => 'edit', $like->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Likes', 'action' => 'delete', $like->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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