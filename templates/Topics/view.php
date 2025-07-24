<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Topic $topic
 */
 $this->set('title_2', 'Theme');
?>
<div class="row">
    <div class="column column-80">
        <div class="topics view content">
            <div class="text-center">
                <h3>Theme : <?= h($topic->name) ?></h3>
            </div>
            <hr>
            <div class="related">
                <h5><?= __('Prédications') ?></h5>
                <?php if (!empty($topic->sermons)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Titre') ?></th>
                            <th><?= __('Versets') ?></th>
                            <th><?= __('Contributeur') ?></th>
                            <th><?= __('Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($topic->sermons as $sermon) : ?>
                        <tr>
                            <td><?= h($sermon->id) ?></td>
                            <td><?= h($sermon->title) ?></td>
                            <td><?= h($sermon->verse) ?></td>
                            <td><?= h($sermon->contributor) ?></td>
                            <td><?= h($sermon->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Sermons', 'action' => 'view', $sermon->id], ['class' => 'btn btn-success btn-sm']) ?>
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
