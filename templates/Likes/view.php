<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Like $like
 */
 $this->set('title_2', 'Likes');
?>
<div class="row">
    <div class="column column-80">
        <div class="likes view content">
            <h3><?= h($like->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Sermon') ?></th>
                    <td><?= $like->hasValue('sermon') ? $this->Html->link($like->sermon->title, ['controller' => 'Sermons', 'action' => 'view', $like->sermon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Member') ?></th>
                    <td><?= $like->hasValue('member') ? $this->Html->link($like->member->id, ['controller' => 'Members', 'action' => 'view', $like->member->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($like->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($like->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($like->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($like->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($like->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $like->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>