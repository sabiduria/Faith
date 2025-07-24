<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer $answer
 */
 $this->set('title_2', 'Answers');
?>
<div class="row">
    <div class="column column-80">
        <div class="answers view content">
            <h3><?= h($answer->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Comment') ?></th>
                    <td><?= $answer->hasValue('comment') ? $this->Html->link($answer->comment->id, ['controller' => 'Comments', 'action' => 'view', $answer->comment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($answer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($answer->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($answer->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($answer->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($answer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($answer->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($answer->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $answer->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Answer') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($answer->answer)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>