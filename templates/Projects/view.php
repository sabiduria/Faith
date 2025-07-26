<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
 $this->set('title_2', 'Projects');
?>
<div class="row">
    <div class="column column-80">
        <div class="projects view content">
            <h3><?= h($project->title) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($project->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $project->hasValue('church') ? $this->Html->link($project->church->name, ['controller' => 'Churchs', 'action' => 'view', $project->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Status') ?></th>
                    <td><?= h($project->project_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($project->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($project->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $project->amount === null ? '' : $this->Number->format($project->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($project->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($project->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($project->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($project->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $project->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $project->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Contributions') ?></h4>
                <?php if (!empty($project->contributions)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Donator') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->contributions as $contribution) : ?>
                        <tr>
                            <td><?= h($contribution->id) ?></td>
                            <td><?= h($contribution->project_id) ?></td>
                            <td><?= h($contribution->donator) ?></td>
                            <td><?= h($contribution->phone) ?></td>
                            <td><?= h($contribution->amount) ?></td>
                            <td><?= h($contribution->created) ?></td>
                            <td><?= h($contribution->modified) ?></td>
                            <td><?= h($contribution->createdby) ?></td>
                            <td><?= h($contribution->modifiedby) ?></td>
                            <td><?= h($contribution->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Contributions', 'action' => 'view', $contribution->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Contributions', 'action' => 'edit', $contribution->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Contributions', 'action' => 'delete', $contribution->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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