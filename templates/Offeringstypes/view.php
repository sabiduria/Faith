<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offeringstype $offeringstype
 */

use App\Controller\GeneralController;

$this->set('title_2', 'Type d\'offrandes');
?>
<div class="row">
    <div class="column column-80">
        <div class="offeringstypes view content">
            <h3><?= h($offeringstype->name) ?></h3>
            <hr>
            <div class="related">
                <h5><?= __('Offrandes') ?></h5>
                <?php if (!empty($offeringstype->offerings)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Service') ?></th>
                            <th><?= __('Date du service') ?></th>
                            <th><?= __('Montant') ?></th>
                            <th><?= __('Devise') ?></th>
                            <th><?= __('Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offeringstype->offerings as $offering) : ?>
                        <tr>
                            <td><?= h($offering->id) ?></td>
                            <td><?= GeneralController::getNameOf($offering->service_id, 'Services') ?></td>
                            <td><?= h($offering->service_date) ?></td>
                            <td><?= h($offering->amount) ?></td>
                            <td><?= GeneralController::getNameOf($offering->currency_id, 'Currencies') ?></td>
                            <td><?= h($offering->created) ?></td>
                            <td class="actions">
                                <!--?= $this->Html->link(__('Details'), ['controller' => 'Offerings', 'action' => 'view', $offering->id], ['class' => 'btn btn-success btn-sm']) ?-->
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Offerings', 'action' => 'edit', $offering->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <!--?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Offerings', 'action' => 'delete', $offering->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?-->
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
