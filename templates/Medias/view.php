<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media $media
 */
 $this->set('title_2', 'Medias');
?>
<div class="row">
    <div class="column column-80">
        <div class="medias view content">
            <h3><?= h($media->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Sermon') ?></th>
                    <td><?= $media->hasValue('sermon') ? $this->Html->link($media->sermon->title, ['controller' => 'Sermons', 'action' => 'view', $media->sermon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($media->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mediatype') ?></th>
                    <td><?= h($media->mediatype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($media->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($media->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($media->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($media->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($media->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $media->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($media->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Url') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($media->url)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>