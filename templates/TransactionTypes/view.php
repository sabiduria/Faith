<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionType $transactionType
 */
 $this->set('title_2', 'Transaction Types');
?>
<div class="row">
    <div class="column column-80">
        <div class="transactionTypes view content">
            <h3><?= h($transactionType->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($transactionType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($transactionType->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($transactionType->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transactionType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $transactionType->church === null ? '' : $this->Number->format($transactionType->church) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($transactionType->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($transactionType->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $transactionType->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($transactionType->transactions)) : ?>
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
                        <?php foreach ($transactionType->transactions as $transaction) : ?>
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