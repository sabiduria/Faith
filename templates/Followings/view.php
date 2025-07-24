<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Following $following
 */
 $this->set('title_2', 'Followings');
?>
<div class="row">
    <div class="column column-80">
        <div class="followings view content">
            <h3><?= h($following->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Member') ?></th>
                    <td><?= $following->hasValue('member') ? $this->Html->link($following->member->id, ['controller' => 'Members', 'action' => 'view', $following->member->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($following->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($following->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($following->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $following->church === null ? '' : $this->Number->format($following->church) ?></td>
                </tr>
                <tr>
                    <th><?= __('Following Date') ?></th>
                    <td><?= h($following->following_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($following->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($following->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Following Status') ?></th>
                    <td><?= $following->following_status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $following->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>