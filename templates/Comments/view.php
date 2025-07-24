<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
 $this->set('title_2', 'Comments');
?>
<div class="row">
    <div class="column column-80">
        <div class="comments view content">
            <h3><?= h($comment->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Sermon') ?></th>
                    <td><?= $comment->hasValue('sermon') ? $this->Html->link($comment->sermon->title, ['controller' => 'Sermons', 'action' => 'view', $comment->sermon->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($comment->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($comment->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($comment->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($comment->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($comment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($comment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($comment->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $comment->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->comment)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Answers') ?></h4>
                <?php if (!empty($comment->answers)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Comment Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Answer') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($comment->answers as $answer) : ?>
                        <tr>
                            <td><?= h($answer->id) ?></td>
                            <td><?= h($answer->comment_id) ?></td>
                            <td><?= h($answer->name) ?></td>
                            <td><?= h($answer->email) ?></td>
                            <td><?= h($answer->answer) ?></td>
                            <td><?= h($answer->created) ?></td>
                            <td><?= h($answer->modified) ?></td>
                            <td><?= h($answer->createdby) ?></td>
                            <td><?= h($answer->modifiedby) ?></td>
                            <td><?= h($answer->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Answers', 'action' => 'view', $answer->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Answers', 'action' => 'edit', $answer->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Answers', 'action' => 'delete', $answer->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>