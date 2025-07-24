<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
 $this->set('title_2', 'Transactions');
?>
<div class="row">
    <div class="column column-80">
        <div class="transactions view content">
            <h3><?= h($transaction->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Transaction Type') ?></th>
                    <td><?= $transaction->hasValue('transaction_type') ? $this->Html->link($transaction->transaction_type->name, ['controller' => 'TransactionTypes', 'action' => 'view', $transaction->transaction_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $transaction->hasValue('church') ? $this->Html->link($transaction->church->name, ['controller' => 'Churchs', 'action' => 'view', $transaction->church->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Donator') ?></th>
                    <td><?= h($transaction->donator) ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $transaction->hasValue('currency') ? $this->Html->link($transaction->currency->name, ['controller' => 'Currencies', 'action' => 'view', $transaction->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($transaction->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($transaction->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transaction->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $transaction->amount === null ? '' : $this->Number->format($transaction->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Transaction Date') ?></th>
                    <td><?= h($transaction->transaction_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($transaction->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($transaction->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $transaction->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($transaction->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>