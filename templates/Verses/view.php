<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Verse $verse
 */
 $this->set('title_2', 'Verses');
?>
<div class="row">
    <div class="column column-80">
        <div class="verses view content">
            <h3><?= h($verse->title) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Sermon') ?></th>
                    <td><?= $verse->hasValue('sermon') ? $this->Html->link($verse->sermon->title, ['controller' => 'Sermons', 'action' => 'view', $verse->sermon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($verse->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($verse->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($verse->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($verse->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($verse->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($verse->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $verse->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($verse->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>