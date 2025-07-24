<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipment $equipment
 */
 $this->set('title_2', 'Equipments');
?>
<div class="row">
    <div class="column column-80">
        <div class="equipments view content">
            <h3><?= h($equipment->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $equipment->hasValue('church') ? $this->Html->link($equipment->church->name, ['controller' => 'Churchs', 'action' => 'view', $equipment->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($equipment->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment Status') ?></th>
                    <td><?= h($equipment->equipment_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($equipment->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($equipment->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($equipment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $equipment->price === null ? '' : $this->Number->format($equipment->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Acquisition Date') ?></th>
                    <td><?= h($equipment->acquisition_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($equipment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($equipment->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $equipment->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($equipment->notes)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Maintenances') ?></h4>
                <?php if (!empty($equipment->maintenances)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Equipment Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Problem') ?></th>
                            <th><?= __('Resolution') ?></th>
                            <th><?= __('Expense') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($equipment->maintenances as $maintenance) : ?>
                        <tr>
                            <td><?= h($maintenance->id) ?></td>
                            <td><?= h($maintenance->equipment_id) ?></td>
                            <td><?= h($maintenance->name) ?></td>
                            <td><?= h($maintenance->problem) ?></td>
                            <td><?= h($maintenance->resolution) ?></td>
                            <td><?= h($maintenance->expense) ?></td>
                            <td><?= h($maintenance->created) ?></td>
                            <td><?= h($maintenance->modified) ?></td>
                            <td><?= h($maintenance->createdby) ?></td>
                            <td><?= h($maintenance->modifiedby) ?></td>
                            <td><?= h($maintenance->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Maintenances', 'action' => 'view', $maintenance->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Maintenances', 'action' => 'edit', $maintenance->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Maintenances', 'action' => 'delete', $maintenance->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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