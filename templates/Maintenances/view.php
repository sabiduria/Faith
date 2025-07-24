<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maintenance $maintenance
 */
 $this->set('title_2', 'Maintenances');
?>
<div class="row">
    <div class="column column-80">
        <div class="maintenances view content">
            <h3><?= h($maintenance->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Equipment') ?></th>
                    <td><?= $maintenance->hasValue('equipment') ? $this->Html->link($maintenance->equipment->name, ['controller' => 'Equipments', 'action' => 'view', $maintenance->equipment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($maintenance->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($maintenance->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($maintenance->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($maintenance->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expense') ?></th>
                    <td><?= $maintenance->expense === null ? '' : $this->Number->format($maintenance->expense) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($maintenance->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($maintenance->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $maintenance->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Problem') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($maintenance->problem)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Resolution') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($maintenance->resolution)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>