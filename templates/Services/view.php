<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
 $this->set('title_2', 'Services');
?>
<div class="row">
    <div class="column column-80">
        <div class="services view content">
            <h3><?= h($service->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $service->hasValue('church') ? $this->Html->link($service->church->name, ['controller' => 'Churchs', 'action' => 'view', $service->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($service->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($service->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($service->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($service->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($service->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($service->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $service->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($service->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Offerings') ?></h4>
                <?php if (!empty($service->offerings)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Service Id') ?></th>
                            <th><?= __('Service Date') ?></th>
                            <th><?= __('Offeringstype Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Church') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($service->offerings as $offering) : ?>
                        <tr>
                            <td><?= h($offering->id) ?></td>
                            <td><?= h($offering->service_id) ?></td>
                            <td><?= h($offering->service_date) ?></td>
                            <td><?= h($offering->offeringstype_id) ?></td>
                            <td><?= h($offering->amount) ?></td>
                            <td><?= h($offering->currency_id) ?></td>
                            <td><?= h($offering->church) ?></td>
                            <td><?= h($offering->created) ?></td>
                            <td><?= h($offering->modified) ?></td>
                            <td><?= h($offering->createdby) ?></td>
                            <td><?= h($offering->modifiedby) ?></td>
                            <td><?= h($offering->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Offerings', 'action' => 'view', $offering->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Offerings', 'action' => 'edit', $offering->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Offerings', 'action' => 'delete', $offering->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Participations') ?></h4>
                <?php if (!empty($service->participations)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Service Id') ?></th>
                            <th><?= __('Participation Date') ?></th>
                            <th><?= __('Number People') ?></th>
                            <th><?= __('Male People') ?></th>
                            <th><?= __('Female People') ?></th>
                            <th><?= __('Children People') ?></th>
                            <th><?= __('Church') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($service->participations as $participation) : ?>
                        <tr>
                            <td><?= h($participation->id) ?></td>
                            <td><?= h($participation->service_id) ?></td>
                            <td><?= h($participation->participation_date) ?></td>
                            <td><?= h($participation->number_people) ?></td>
                            <td><?= h($participation->male_people) ?></td>
                            <td><?= h($participation->female_people) ?></td>
                            <td><?= h($participation->children_people) ?></td>
                            <td><?= h($participation->church) ?></td>
                            <td><?= h($participation->created) ?></td>
                            <td><?= h($participation->modified) ?></td>
                            <td><?= h($participation->createdby) ?></td>
                            <td><?= h($participation->modifiedby) ?></td>
                            <td><?= h($participation->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Participations', 'action' => 'view', $participation->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Participations', 'action' => 'edit', $participation->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Participations', 'action' => 'delete', $participation->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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