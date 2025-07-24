<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Offering> $offerings
 */
$this->set('title_2', 'Offerings');
$Number = 1;
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <button class="btn btn-sm btn-primary-light mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#NewItem" aria-controls="NewItem"><i class="fa-thin fa-plus"></i> Ajouter</button>
    <?= $this->Html->link(__('Nouveau Offering'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm mb-3']) ?>
    <div class="table-responsive">
        <table id="scroll-vertical" class="table table-bordered text-nowrap w-100 TableData">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N°') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('service_id') ?></th>
                    <th><?= $this->Paginator->sort('service_date') ?></th>
                    <th><?= $this->Paginator->sort('offeringstype_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('currency_id') ?></th>
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
                <?php foreach ($offerings as $offering): ?>
                <tr>
                    <td><?= $Number++ ?></td>
                    <td><?= $this->Number->format($offering->id) ?></td>
                    <td><?= $offering->hasValue('service') ? $this->Html->link($offering->service->name, ['controller' => 'Services', 'action' => 'view', $offering->service->id]) : '' ?></td>
                    <td><?= h($offering->service_date) ?></td>
                    <td><?= $offering->hasValue('offeringstype') ? $this->Html->link($offering->offeringstype->name, ['controller' => 'Offeringstypes', 'action' => 'view', $offering->offeringstype->id]) : '' ?></td>
                    <td><?= $offering->amount === null ? '' : $this->Number->format($offering->amount) ?></td>
                    <td><?= $offering->hasValue('currency') ? $this->Html->link($offering->currency->name, ['controller' => 'Currencies', 'action' => 'view', $offering->currency->id]) : '' ?></td>
                    <td><?= $offering->church === null ? '' : $this->Number->format($offering->church) ?></td>
                    <td><?= h($offering->created) ?></td>
                    <td><?= h($offering->modified) ?></td>
                    <td><?= h($offering->createdby) ?></td>
                    <td><?= h($offering->modifiedby) ?></td>
                    <td><?= h($offering->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $offering->id], ['class' => 'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $offering->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $offering->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
        <h5 class="offcanvas-title" id="offcanvasRightLabel1">Nouveau Offerings</h5>
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
                <?= $this->Form->control('service_date', ['empty' => true, 'class' => 'form-control', 'label' => 'service_date']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('offeringstype_id', ['options' => $offeringstypes, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'offeringstype_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => 'amount']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('currency_id', ['options' => $currencies, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'currency_id']); ?>
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
                url: '<?= $this->Url->build(["controller" => 'Offerings', 'action' => 'insert']) ?>',
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