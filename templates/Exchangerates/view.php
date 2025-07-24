<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exchangerate $exchangerate
 */
 $this->set('title_2', 'Exchangerates');
?>
<div class="row">
    <div class="column column-80">
        <div class="exchangerates view content">
            <h3><?= h($exchangerate->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($exchangerate->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($exchangerate->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exchangerate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency1') ?></th>
                    <td><?= $exchangerate->currency1 === null ? '' : $this->Number->format($exchangerate->currency1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency2') ?></th>
                    <td><?= $exchangerate->currency2 === null ? '' : $this->Number->format($exchangerate->currency2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $exchangerate->amount === null ? '' : $this->Number->format($exchangerate->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $exchangerate->church === null ? '' : $this->Number->format($exchangerate->church) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($exchangerate->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($exchangerate->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $exchangerate->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>