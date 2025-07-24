<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChurchGroup $churchGroup
 */
 $this->set('title_2', 'Church Groups');
?>
<div class="row">
    <div class="column column-80">
        <div class="churchGroups view content">
            <h3><?= h($churchGroup->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($churchGroup->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Group Status') ?></th>
                    <td><?= h($churchGroup->group_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($churchGroup->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($churchGroup->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($churchGroup->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($churchGroup->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($churchGroup->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $churchGroup->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Group Members') ?></h4>
                <?php if (!empty($churchGroup->group_members)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Church Group Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Approved') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($churchGroup->group_members as $groupMember) : ?>
                        <tr>
                            <td><?= h($groupMember->id) ?></td>
                            <td><?= h($groupMember->church_group_id) ?></td>
                            <td><?= h($groupMember->church_id) ?></td>
                            <td><?= h($groupMember->approved) ?></td>
                            <td><?= h($groupMember->created) ?></td>
                            <td><?= h($groupMember->modified) ?></td>
                            <td><?= h($groupMember->createdby) ?></td>
                            <td><?= h($groupMember->modifiedby) ?></td>
                            <td><?= h($groupMember->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'GroupMembers', 'action' => 'view', $groupMember->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'GroupMembers', 'action' => 'edit', $groupMember->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'GroupMembers', 'action' => 'delete', $groupMember->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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