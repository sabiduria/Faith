<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Denomination $denomination
 */
 $this->set('title_2', 'Denominations');
?>
<div class="row">
    <div class="column column-80">
        <div class="denominations view content">
            <h3><?= h($denomination->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($denomination->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($denomination->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($denomination->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($denomination->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($denomination->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($denomination->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $denomination->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Churchs') ?></h4>
                <?php if (!empty($denomination->churchs)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Reference') ?></th>
                            <th><?= __('Denomination Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Phone1') ?></th>
                            <th><?= __('Phone2') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($denomination->churchs as $church) : ?>
                        <tr>
                            <td><?= h($church->id) ?></td>
                            <td><?= h($church->reference) ?></td>
                            <td><?= h($church->denomination_id) ?></td>
                            <td><?= h($church->name) ?></td>
                            <td><?= h($church->description) ?></td>
                            <td><?= h($church->address) ?></td>
                            <td><?= h($church->phone1) ?></td>
                            <td><?= h($church->phone2) ?></td>
                            <td><?= h($church->email) ?></td>
                            <td><?= h($church->website) ?></td>
                            <td><?= h($church->created) ?></td>
                            <td><?= h($church->modified) ?></td>
                            <td><?= h($church->createdby) ?></td>
                            <td><?= h($church->modifiedby) ?></td>
                            <td><?= h($church->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Churchs', 'action' => 'view', $church->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Churchs', 'action' => 'edit', $church->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Churchs', 'action' => 'delete', $church->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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