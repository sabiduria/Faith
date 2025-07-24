<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sermon> $sermons
 */
$this->set('title_2', 'Prédications');
$Number = 1;
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Html->link(__('Nouvelle Prédication'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm mb-3']) ?>
    <div class="table-responsive">
        <table id="scroll-vertical" class="table table-bordered text-nowrap w-100 TableData">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N°') ?></th>
                    <th><?= $this->Paginator->sort('Theme') ?></th>
                    <th><?= $this->Paginator->sort('Titre') ?></th>
                    <th><?= $this->Paginator->sort('Contributeur') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sermons as $sermon): ?>
                <tr>
                    <td><?= $Number++ ?></td>
                    <td><?= $sermon->hasValue('topic') ? $this->Html->link($sermon->topic->name, ['controller' => 'Topics', 'action' => 'view', $sermon->topic->id]) : '' ?></td>
                    <td>
                        <strong><?= h($sermon->title) ?></strong> <br>
                        <span class="badge bg-secondary"><i class="ri-git-repository-line"></i> Versets : <?= h($sermon->verse) ?></span>

                    </td>
                    <td><?= h($sermon->contributor) ?></td>
                    <td><?= h($sermon->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $sermon->id], ['class' => 'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $sermon->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $sermon->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
