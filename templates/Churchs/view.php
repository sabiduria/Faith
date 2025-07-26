<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Church $church
 */
 $this->set('title_2', 'Churchs');
?>
<div class="row">
    <div class="column column-80">
        <div class="churchs view content">
            <h3><?= h($church->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Reference') ?></th>
                    <td><?= h($church->reference) ?></td>
                </tr>
                <tr>
                    <th><?= __('Denomination') ?></th>
                    <td><?= $church->hasValue('denomination') ? $this->Html->link($church->denomination->name, ['controller' => 'Denominations', 'action' => 'view', $church->denomination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($church->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($church->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone1') ?></th>
                    <td><?= h($church->phone1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone2') ?></th>
                    <td><?= h($church->phone2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($church->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Website') ?></th>
                    <td><?= h($church->website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Createdby') ?></th>
                    <td><?= h($church->createdby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modifiedby') ?></th>
                    <td><?= h($church->modifiedby) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($church->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($church->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($church->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $church->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($church->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Affecations') ?></h4>
                <?php if (!empty($church->affecations)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Isactive') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($church->affecations as $affecation) : ?>
                        <tr>
                            <td><?= h($affecation->id) ?></td>
                            <td><?= h($affecation->user_id) ?></td>
                            <td><?= h($affecation->church_id) ?></td>
                            <td><?= h($affecation->isactive) ?></td>
                            <td><?= h($affecation->created) ?></td>
                            <td><?= h($affecation->modified) ?></td>
                            <td><?= h($affecation->createdby) ?></td>
                            <td><?= h($affecation->modifiedby) ?></td>
                            <td><?= h($affecation->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Affecations', 'action' => 'view', $affecation->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Affecations', 'action' => 'edit', $affecation->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Affecations', 'action' => 'delete', $affecation->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Equipments') ?></h4>
                <?php if (!empty($church->equipments)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Equipment Status') ?></th>
                            <th><?= __('Acquisition Date') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($church->equipments as $equipment) : ?>
                        <tr>
                            <td><?= h($equipment->id) ?></td>
                            <td><?= h($equipment->church_id) ?></td>
                            <td><?= h($equipment->name) ?></td>
                            <td><?= h($equipment->notes) ?></td>
                            <td><?= h($equipment->price) ?></td>
                            <td><?= h($equipment->equipment_status) ?></td>
                            <td><?= h($equipment->acquisition_date) ?></td>
                            <td><?= h($equipment->created) ?></td>
                            <td><?= h($equipment->modified) ?></td>
                            <td><?= h($equipment->createdby) ?></td>
                            <td><?= h($equipment->modifiedby) ?></td>
                            <td><?= h($equipment->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Equipments', 'action' => 'view', $equipment->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Equipments', 'action' => 'edit', $equipment->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Equipments', 'action' => 'delete', $equipment->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Group Members') ?></h4>
                <?php if (!empty($church->group_members)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Church Group Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Approved') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($church->group_members as $groupMember) : ?>
                        <tr>
                            <td><?= h($groupMember->id) ?></td>
                            <td><?= h($groupMember->church_group_id) ?></td>
                            <td><?= h($groupMember->church_id) ?></td>
                            <td><?= h($groupMember->approved) ?></td>
                            <td><?= h($groupMember->created) ?></td>
                            <td><?= h($groupMember->modified) ?></td>
                            <td><?= h($groupMember->createdby) ?></td>
                            <td><?= h($groupMember->modifiedby) ?></td>
                            <td><?= h($groupMember->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'GroupMembers', 'action' => 'view', $groupMember->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'GroupMembers', 'action' => 'edit', $groupMember->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'GroupMembers', 'action' => 'delete', $groupMember->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Members') ?></h4>
                <?php if (!empty($church->members)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Membership Id') ?></th>
                            <th><?= __('Reference') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Secondname') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Phone1') ?></th>
                            <th><?= __('Phone2') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Marital Status') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Birthdate') ?></th>
                            <th><?= __('Avatar') ?></th>
                            <th><?= __('Occupation') ?></th>
                            <th><?= __('Membership Date') ?></th>
                            <th><?= __('Baptism Status') ?></th>
                            <th><?= __('Emergency Contact Name') ?></th>
                            <th><?= __('Emergency Contact Phone') ?></th>
                            <th><?= __('Member Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($church->members as $member) : ?>
                        <tr>
                            <td><?= h($member->id) ?></td>
                            <td><?= h($member->church_id) ?></td>
                            <td><?= h($member->role_id) ?></td>
                            <td><?= h($member->department_id) ?></td>
                            <td><?= h($member->membership_id) ?></td>
                            <td><?= h($member->reference) ?></td>
                            <td><?= h($member->firstname) ?></td>
                            <td><?= h($member->secondname) ?></td>
                            <td><?= h($member->lastname) ?></td>
                            <td><?= h($member->gender) ?></td>
                            <td><?= h($member->phone1) ?></td>
                            <td><?= h($member->phone2) ?></td>
                            <td><?= h($member->email) ?></td>
                            <td><?= h($member->marital_status) ?></td>
                            <td><?= h($member->address) ?></td>
                            <td><?= h($member->birthdate) ?></td>
                            <td><?= h($member->avatar) ?></td>
                            <td><?= h($member->occupation) ?></td>
                            <td><?= h($member->membership_date) ?></td>
                            <td><?= h($member->baptism_status) ?></td>
                            <td><?= h($member->emergency_contact_name) ?></td>
                            <td><?= h($member->emergency_contact_phone) ?></td>
                            <td><?= h($member->member_status) ?></td>
                            <td><?= h($member->created) ?></td>
                            <td><?= h($member->modified) ?></td>
                            <td><?= h($member->createdby) ?></td>
                            <td><?= h($member->modifiedby) ?></td>
                            <td><?= h($member->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Members', 'action' => 'view', $member->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Members', 'action' => 'edit', $member->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Members', 'action' => 'delete', $member->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($church->projects)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Project Status') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($church->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->title) ?></td>
                            <td><?= h($project->description) ?></td>
                            <td><?= h($project->start_date) ?></td>
                            <td><?= h($project->end_date) ?></td>
                            <td><?= h($project->church_id) ?></td>
                            <td><?= h($project->amount) ?></td>
                            <td><?= h($project->project_status) ?></td>
                            <td><?= h($project->is_active) ?></td>
                            <td><?= h($project->created) ?></td>
                            <td><?= h($project->modified) ?></td>
                            <td><?= h($project->createdby) ?></td>
                            <td><?= h($project->modifiedby) ?></td>
                            <td><?= h($project->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Projects', 'action' => 'view', $project->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Projects', 'action' => 'edit', $project->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Sermons') ?></h4>
                <?php if (!empty($church->sermons)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Topic Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Banner') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Verse') ?></th>
                            <th><?= __('Summary') ?></th>
                            <th><?= __('Sermon') ?></th>
                            <th><?= __('Contributor') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($church->sermons as $sermon) : ?>
                        <tr>
                            <td><?= h($sermon->id) ?></td>
                            <td><?= h($sermon->topic_id) ?></td>
                            <td><?= h($sermon->church_id) ?></td>
                            <td><?= h($sermon->banner) ?></td>
                            <td><?= h($sermon->title) ?></td>
                            <td><?= h($sermon->verse) ?></td>
                            <td><?= h($sermon->summary) ?></td>
                            <td><?= h($sermon->sermon) ?></td>
                            <td><?= h($sermon->contributor) ?></td>
                            <td><?= h($sermon->created) ?></td>
                            <td><?= h($sermon->modified) ?></td>
                            <td><?= h($sermon->createdby) ?></td>
                            <td><?= h($sermon->modifiedby) ?></td>
                            <td><?= h($sermon->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Sermons', 'action' => 'view', $sermon->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Sermons', 'action' => 'edit', $sermon->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Sermons', 'action' => 'delete', $sermon->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Services') ?></h4>
                <?php if (!empty($church->services)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Church Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Createdby') ?></th>
                            <th><?= __('Modifiedby') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($church->services as $service) : ?>
                        <tr>
                            <td><?= h($service->id) ?></td>
                            <td><?= h($service->church_id) ?></td>
                            <td><?= h($service->name) ?></td>
                            <td><?= h($service->description) ?></td>
                            <td><?= h($service->created) ?></td>
                            <td><?= h($service->modified) ?></td>
                            <td><?= h($service->createdby) ?></td>
                            <td><?= h($service->modifiedby) ?></td>
                            <td><?= h($service->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Details'), ['controller' => 'Services', 'action' => 'view', $service->id], ['class' => 'btn btn-success btn-sm']) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Services', 'action' => 'edit', $service->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Services', 'action' => 'delete', $service->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Transactions') ?></h4>
                <?php if (!empty($church->transactions)) : ?>
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
                        <?php foreach ($church->transactions as $transaction) : ?>
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