<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 */
$this->set('title_2', 'Projets');
$Number = 1;
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Html->link(__('Nouveau Projet'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary-light mb-3']) ?>
    <div class="table-responsive">
        <table id="scroll-vertical" class="table table-bordered text-nowrap w-100 TableData">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N°') ?></th>
                    <th><?= $this->Paginator->sort('Titre') ?></th>
                    <th><?= $this->Paginator->sort('Date d\'execution') ?></th>
                    <th><?= $this->Paginator->sort('Progression') ?></th>
                    <th><?= $this->Paginator->sort('Montant') ?></th>
                    <th><?= $this->Paginator->sort('Statuts') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $Number++ ?></td>
                    <td>
                        <?= $project->title >=45 ? substr($project->title, 0, 45) . '...' : $project->title ?>
                    </td>
                    <td><?= h($project->start_date) ?>  au <?= h($project->end_date) ?></td>
                    <td>
                        <div>
                            <div class="progress progress-xs progress-animate" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-primary" style="width: 65%"></div>
                            </div>
                            <div class="mt-1"><span class="text-primary fw-medium">65%</span> Completed</div>
                        </div>
                    </td>
                    <td><?= $project->amount === null ? '' : $this->Number->format($project->amount) ?> USD</td>
                    <td><?= h($project->project_status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $project->id], ['class' => 'btn btn-success btn-sm']) ?>
                        <!--?= $this->Html->link(__('Editer'), ['action' => 'edit', $project->id], ['class' => 'btn btn-primary btn-sm']) ?-->
                        <!--?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $project->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?-->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
