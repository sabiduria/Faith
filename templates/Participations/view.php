<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participation $participation
 */
 $this->set('title_2', 'Participations');
?>
<div class="row">
    <div class="column column-80">
        <div class="participations view content">
            <h3><?= h($participation->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Service') ?></th>
                    <td><?= $participation->hasValue('service') ? $this->Html->link($participation->service->name, ['controller' => 'Services', 'action' => 'view', $participation->service->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($participation->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($participation->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($participation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number People') ?></th>
                    <td><?= $participation->number_people === null ? '' : $this->Number->format($participation->number_people) ?></td>
                </tr>
                <tr>
                    <th><?= __('Male People') ?></th>
                    <td><?= $participation->male_people === null ? '' : $this->Number->format($participation->male_people) ?></td>
                </tr>
                <tr>
                    <th><?= __('Female People') ?></th>
                    <td><?= $participation->female_people === null ? '' : $this->Number->format($participation->female_people) ?></td>
                </tr>
                <tr>
                    <th><?= __('Children People') ?></th>
                    <td><?= $participation->children_people === null ? '' : $this->Number->format($participation->children_people) ?></td>
                </tr>
                <tr>
                    <th><?= __('Church') ?></th>
                    <td><?= $participation->church === null ? '' : $this->Number->format($participation->church) ?></td>
                </tr>
                <tr>
                    <th><?= __('Participation Date') ?></th>
                    <td><?= h($participation->participation_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($participation->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($participation->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $participation->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>