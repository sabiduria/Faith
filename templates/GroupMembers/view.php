<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GroupMember $groupMember
 */
 $this->set('title_2', 'Group Members');
?>
<div class="row">
    <div class="column column-80">
        <div class="groupMembers view content">
            <h3><?= h($groupMember->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Church Group') ?></th>
                    <td><?= $groupMember->hasValue('church_group') ? $this->Html->link($groupMember->church_group->name, ['controller' => 'ChurchGroups', 'action' => 'view', $groupMember->church_group->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $groupMember->hasValue('church') ? $this->Html->link($groupMember->church->name, ['controller' => 'Churchs', 'action' => 'view', $groupMember->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($groupMember->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($groupMember->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($groupMember->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($groupMember->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($groupMember->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Approved') ?></th>
                    <td><?= $groupMember->approved ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $groupMember->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>