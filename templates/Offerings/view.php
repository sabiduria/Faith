<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offering $offering
 */
 $this->set('title_2', 'Offerings');
?>
<div class="row">
    <div class="column column-80">
        <div class="offerings view content">
            <h3><?= h($offering->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Service') ?></th>
                    <td><?= $offering->hasValue('service') ? $this->Html->link($offering->service->name, ['controller' => 'Services', 'action' => 'view', $offering->service->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Offeringstype') ?></th>
                    <td><?= $offering->hasValue('offeringstype') ? $this->Html->link($offering->offeringstype->name, ['controller' => 'Offeringstypes', 'action' => 'view', $offering->offeringstype->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $offering->hasValue('currency') ? $this->Html->link($offering->currency->name, ['controller' => 'Currencies', 'action' => 'view', $offering->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($offering->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($offering->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($offering->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $offering->amount === null ? '' : $this->Number->format($offering->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $offering->church === null ? '' : $this->Number->format($offering->church) ?></td>
                </tr>
                <tr>
                    <th><?= __('Service Date') ?></th>
                    <td><?= h($offering->service_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($offering->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($offering->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $offering->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>