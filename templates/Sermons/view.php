<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sermon $sermon
 */
 $this->set('title_2', 'Sermons');
?>
<div class="row">
    <div class="column column-80">
        <div class="sermons view content">
            <h3><?= h($sermon->title) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Topic') ?></th>
                    <td><?= $sermon->hasValue('topic') ? $this->Html->link($sermon->topic->name, ['controller' => 'Topics', 'action' => 'view', $sermon->topic->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $sermon->hasValue('church') ? $this->Html->link($sermon->church->name, ['controller' => 'Churchs', 'action' => 'view', $sermon->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($sermon->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Verse') ?></th>
                    <td><?= h($sermon->verse) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contributor') ?></th>
                    <td><?= h($sermon->contributor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($sermon->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($sermon->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sermon->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sermon->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sermon->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $sermon->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Banner') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sermon->banner)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Summary') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sermon->summary)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Sermon') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sermon->sermon)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Comments') ?></h4>
                <?php if (!empty($sermon->comments)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sermon Id') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sermon->comments as $comment) : ?>
                        <tr>
                            <td><?= h($comment->id) ?></td>
                            <td><?= h($comment->sermon_id) ?></td>
                            <td><?= h($comment->comment) ?></td>
                            <td><?= h($comment->created) ?></td>
                            <td><?= h($comment->modified) ?></td>
                            <td><?= h($comment->createdby) ?></td>
                            <td><?= h($comment->modifiedby) ?></td>
                            <td><?= h($comment->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Comments', 'action' => 'view', $comment->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Comments', 'action' => 'edit', $comment->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Comments', 'action' => 'delete', $comment->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Likes') ?></h4>
                <?php if (!empty($sermon->likes)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sermon Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sermon->likes as $like) : ?>
                        <tr>
                            <td><?= h($like->id) ?></td>
                            <td><?= h($like->sermon_id) ?></td>
                            <td><?= h($like->member_id) ?></td>
                            <td><?= h($like->created) ?></td>
                            <td><?= h($like->modified) ?></td>
                            <td><?= h($like->createdby) ?></td>
                            <td><?= h($like->modifiedby) ?></td>
                            <td><?= h($like->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Likes', 'action' => 'view', $like->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Likes', 'action' => 'edit', $like->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Likes', 'action' => 'delete', $like->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Medias') ?></h4>
                <?php if (!empty($sermon->medias)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sermon Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Url') ?></th>
                            <th><?= __('Mediatype') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sermon->medias as $media) : ?>
                        <tr>
                            <td><?= h($media->id) ?></td>
                            <td><?= h($media->sermon_id) ?></td>
                            <td><?= h($media->name) ?></td>
                            <td><?= h($media->description) ?></td>
                            <td><?= h($media->url) ?></td>
                            <td><?= h($media->mediatype) ?></td>
                            <td><?= h($media->created) ?></td>
                            <td><?= h($media->modified) ?></td>
                            <td><?= h($media->createdby) ?></td>
                            <td><?= h($media->modifiedby) ?></td>
                            <td><?= h($media->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Medias', 'action' => 'view', $media->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Medias', 'action' => 'edit', $media->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Medias', 'action' => 'delete', $media->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Verses') ?></h4>
                <?php if (!empty($sermon->verses)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Sermon Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sermon->verses as $verse) : ?>
                        <tr>
                            <td><?= h($verse->id) ?></td>
                            <td><?= h($verse->sermon_id) ?></td>
                            <td><?= h($verse->title) ?></td>
                            <td><?= h($verse->description) ?></td>
                            <td><?= h($verse->created) ?></td>
                            <td><?= h($verse->modified) ?></td>
                            <td><?= h($verse->createdby) ?></td>
                            <td><?= h($verse->modifiedby) ?></td>
                            <td><?= h($verse->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Verses', 'action' => 'view', $verse->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Verses', 'action' => 'edit', $verse->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Verses', 'action' => 'delete', $verse->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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