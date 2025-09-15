<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Offering> $offerings
 */
$this->set('title_2', 'Offrandes');
$Number = 1;
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <?= $this->Html->link(__('Ajouter'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary-light mb-3']) ?>
    <div class="table-responsive">
        <table id="scroll-vertical" class="table table-bordered text-nowrap w-100 TableData">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N°') ?></th>
                    <th><?= $this->Paginator->sort('Service') ?></th>
                    <th><?= $this->Paginator->sort('Type') ?></th>
                    <th><?= $this->Paginator->sort('Montant') ?></th>
                    <th><?= $this->Paginator->sort('Devise') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th><?= $this->Paginator->sort('Par') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offerings as $offering): ?>
                <tr>
                    <td><?= $Number++ ?></td>
                    <td>
                        <?= $offering->hasValue('service') ? $this->Html->link($offering->service->name, ['controller' => 'Services', 'action' => 'view', $offering->service->id]) : '' ?>
                        <br>
                        <span class="badge bg-success"><?= h($offering->service_date) ?></span>
                    </td>
                    <td><?= $offering->hasValue('offeringstype') ? $this->Html->link($offering->offeringstype->name, ['controller' => 'Offeringstypes', 'action' => 'view', $offering->offeringstype->id]) : '' ?></td>
                    <td><?= $offering->amount === null ? '' : $this->Number->format($offering->amount) ?></td>
                    <td><?= $offering->hasValue('currency') ? $this->Html->link($offering->currency->name, ['controller' => 'Currencies', 'action' => 'view', $offering->currency->id]) : '' ?></td>
                    <td><?= h($offering->created) ?></td>
                    <td><?= h($offering->createdby) ?></td>
                    <td class="actions">
                        <!--?= $this->Html->link(__('Details'), ['action' => 'view', $offering->id], ['class' => 'btn btn-success btn-sm']) ?-->
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $offering->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $offering->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
