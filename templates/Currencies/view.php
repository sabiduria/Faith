<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Currency $currency
 */
 $this->set('title_2', 'Currencies');
?>
<div class="row">
    <div class="column column-80">
        <div class="currencies view content">
            <h3><?= h($currency->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($currency->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Short Name') ?></th>
                    <td><?= h($currency->short_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($currency->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($currency->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($currency->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($currency->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($currency->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $currency->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Offerings') ?></h4>
                <?php if (!empty($currency->offerings)) : ?>
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
                        <?php foreach ($currency->offerings as $offering) : ?>
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
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($currency->transactions)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Transaction Type Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Transaction Date') ?></th>
                            <th><?= __('Donator') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Currency Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($currency->transactions as $transaction) : ?>
                        <tr>
                            <td><?= h($transaction->id) ?></td>
                            <td><?= h($transaction->transaction_type_id) ?></td>
                            <td><?= h($transaction->church_id) ?></td>
                            <td><?= h($transaction->amount) ?></td>
                            <td><?= h($transaction->transaction_date) ?></td>
                            <td><?= h($transaction->donator) ?></td>
                            <td><?= h($transaction->description) ?></td>
                            <td><?= h($transaction->currency_id) ?></td>
                            <td><?= h($transaction->created) ?></td>
                            <td><?= h($transaction->modified) ?></td>
                            <td><?= h($transaction->createdby) ?></td>
                            <td><?= h($transaction->modifiedby) ?></td>
                            <td><?= h($transaction->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Transactions', 'action' => 'view', $transaction->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Transactions', 'action' => 'edit', $transaction->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Transactions', 'action' => 'delete', $transaction->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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