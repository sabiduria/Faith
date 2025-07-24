<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attendance $attendance
 */
 $this->set('title_2', 'Attendances');
?>
<div class="row">
    <div class="column column-80">
        <div class="attendances view content">
            <h3><?= h($attendance->id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Member') ?></th>
                    <td><?= $attendance->hasValue('member') ? $this->Html->link($attendance->member->id, ['controller' => 'Members', 'action' => 'view', $attendance->member->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Attendance Type') ?></th>
                    <td><?= h($attendance->attendance_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($attendance->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($attendance->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($attendance->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($attendance->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($attendance->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $attendance->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>