<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Participation> $participations
 */
$this->set('title_2', 'Participations');
$Number = 1;
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <button class="btn btn-sm btn-primary-light mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#NewItem" aria-controls="NewItem"><i class="fa-thin fa-plus"></i> Ajouter</button>
    <?= $this->Html->link(__('Nouveau Participation'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm mb-3']) ?>
    <div class="table-responsive">
        <table id="scroll-vertical" class="table table-bordered text-nowrap w-100 TableData">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N°') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('service_id') ?></th>
                    <th><?= $this->Paginator->sort('participation_date') ?></th>
                    <th><?= $this->Paginator->sort('number_people') ?></th>
                    <th><?= $this->Paginator->sort('male_people') ?></th>
                    <th><?= $this->Paginator->sort('female_people') ?></th>
                    <th><?= $this->Paginator->sort('children_people') ?></th>
                    <th><?= $this->Paginator->sort('church') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('modifiedby') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($participations as $participation): ?>
                <tr>
                    <td><?= $Number++ ?></td>
                    <td><?= $this->Number->format($participation->id) ?></td>
                    <td><?= $participation->hasValue('service') ? $this->Html->link($participation->service->name, ['controller' => 'Services', 'action' => 'view', $participation->service->id]) : '' ?></td>
                    <td><?= h($participation->participation_date) ?></td>
                    <td><?= $participation->number_people === null ? '' : $this->Number->format($participation->number_people) ?></td>
                    <td><?= $participation->male_people === null ? '' : $this->Number->format($participation->male_people) ?></td>
                    <td><?= $participation->female_people === null ? '' : $this->Number->format($participation->female_people) ?></td>
                    <td><?= $participation->children_people === null ? '' : $this->Number->format($participation->children_people) ?></td>
                    <td><?= $participation->church === null ? '' : $this->Number->format($participation->church) ?></td>
                    <td><?= h($participation->created) ?></td>
                    <td><?= h($participation->modified) ?></td>
                    <td><?= h($participation->createdby) ?></td>
                    <td><?= h($participation->modifiedby) ?></td>
                    <td><?= h($participation->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $participation->id], ['class' => 'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $participation->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $participation->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="NewItem"
     aria-labelledby="offcanvasRightLabel1">
    <div class="offcanvas-header border-bottom border-block-end-dashed">
        <h5 class="offcanvas-title" id="offcanvasRightLabel1">Nouveau Participations</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="row">
            <div id="response"></div>
<div class="mt-3">
    <?= $this->Form->create(null, ['id' => 'DataForm']);?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('service_id', ['options' => $services, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'service_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('participation_date', ['empty' => true, 'class' => 'form-control', 'label' => 'participation_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('number_people', ['class' => 'form-control', 'label' => 'number_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('male_people', ['class' => 'form-control', 'label' => 'male_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('female_people', ['class' => 'form-control', 'label' => 'female_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('children_people', ['class' => 'form-control', 'label' => 'children_people']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church', ['class' => 'form-control', 'label' => 'church']); ?>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#DataForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            // Get form data
            var formData = $(this).serialize();

            // Perform AJAX request
            $.ajax({
                url: '<?= $this->Url->build(["controller" => 'Participations', 'action' => 'insert']) ?>',
                method: 'POST',
                data: formData,
                dataType: 'json', // Expecting JSON in the response
                success: function(response) {
                    console.log(response.data); // Log the JSON response
                    $('#response').html('<div class="alert alert-success rounded-pill alert-dismissible fade show mb-1 mt-2">' + response.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button> </div>'); // Show success message
                    var newRow = '<tr>';
                    newRow += '<td>'+''+'</td>'; // Add your actions
                    newRow += '</tr>';

                    // Append the new row to the table
                    $('.TableData tbody').append(newRow);
                    $('#DataForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any error
                    $('#response').html('<p>An error occurred. Please try again.</p>');
                }
            });
        });
    });
</script>