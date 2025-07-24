<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offeringstype $offeringstype
 */
 $this->set('title_2', 'Offeringstypes');
?>
<div class="row">
    <div class="column column-80">
        <div class="offeringstypes view content">
            <h3><?= h($offeringstype->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($offeringstype->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($offeringstype->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($offeringstype->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($offeringstype->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $offeringstype->church === null ? '' : $this->Number->format($offeringstype->church) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($offeringstype->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($offeringstype->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $offeringstype->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Offerings') ?></h4>
                <?php if (!empty($offeringstype->offerings)) : ?>
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
                        <?php foreach ($offeringstype->offerings as $offering) : ?>
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
        </div>
    </div>
</div>