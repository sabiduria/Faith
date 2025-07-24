<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Affecation $affecation
 */
 $this->set('title_2', 'Affecations');
?>
<div class="row">
    <div class="column column-80">
        <div class="affecations view content">
            <h3><?= h($affecation->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $affecation->hasValue('user') ? $this->Html->link($affecation->user->name, ['controller' => 'Users', 'action' => 'view', $affecation->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $affecation->hasValue('church') ? $this->Html->link($affecation->church->name, ['controller' => 'Churchs', 'action' => 'view', $affecation->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($affecation->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($affecation->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($affecation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Isactive') ?></th>
                    <td><?= $affecation->isactive === null ? '' : $this->Number->format($affecation->isactive) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($affecation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($affecation->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $affecation->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>