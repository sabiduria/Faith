<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
 $this->set('title_2', 'Reports');
?>
<div class="row">
    <div class="column column-80">
        <div class="reports view content">
            <h3><?= h($report->title) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($report->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($report->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $report->hasValue('church') ? $this->Html->link($report->church->name, ['controller' => 'Churchs', 'action' => 'view', $report->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($report->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($report->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($report->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($report->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($report->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $report->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Summary') ?></strong>
                <blockquote>
                    <?= html_entity_decode($this->Text->autoParagraph(h($report->summary))); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
