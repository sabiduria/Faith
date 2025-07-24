<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Topic $topic
 */
 $this->set('title_2', 'Topics');
?>
<div class="row">
    <div class="column column-80">
        <div class="topics view content">
            <h3><?= h($topic->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($topic->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($topic->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($topic->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($topic->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $topic->church === null ? '' : $this->Number->format($topic->church) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($topic->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($topic->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $topic->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sermons') ?></h4>
                <?php if (!empty($topic->sermons)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Topic Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Banner') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Verse') ?></th>
                            <th><?= __('Summary') ?></th>
                            <th><?= __('Sermon') ?></th>
                            <th><?= __('Contributor') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($topic->sermons as $sermon) : ?>
                        <tr>
                            <td><?= h($sermon->id) ?></td>
                            <td><?= h($sermon->topic_id) ?></td>
                            <td><?= h($sermon->church_id) ?></td>
                            <td><?= h($sermon->banner) ?></td>
                            <td><?= h($sermon->title) ?></td>
                            <td><?= h($sermon->verse) ?></td>
                            <td><?= h($sermon->summary) ?></td>
                            <td><?= h($sermon->sermon) ?></td>
                            <td><?= h($sermon->contributor) ?></td>
                            <td><?= h($sermon->created) ?></td>
                            <td><?= h($sermon->modified) ?></td>
                            <td><?= h($sermon->createdby) ?></td>
                            <td><?= h($sermon->modifiedby) ?></td>
                            <td><?= h($sermon->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Sermons', 'action' => 'view', $sermon->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Sermons', 'action' => 'edit', $sermon->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Sermons', 'action' => 'delete', $sermon->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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