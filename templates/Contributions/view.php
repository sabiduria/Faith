<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contribution $contribution
 */
 $this->set('title_2', 'Contributions');
?>
<div class="row">
    <div class="column column-80">
        <div class="contributions view content">
            <h3><?= h($contribution->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $contribution->hasValue('project') ? $this->Html->link($contribution->project->title, ['controller' => 'Projects', 'action' => 'view', $contribution->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Donator') ?></th>
                    <td><?= h($contribution->donator) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($contribution->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($contribution->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($contribution->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contribution->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $contribution->amount === null ? '' : $this->Number->format($contribution->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contribution->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($contribution->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $contribution->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>