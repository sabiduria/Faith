<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sermon> $sermons
 */
$this->set('title_2', 'Sermons');
$Number = 1;
$emptyText = "Veuillez selectionner";
?>
<div class="mt-3">
    <button class="btn btn-sm btn-primary-light mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#NewItem" aria-controls="NewItem"><i class="fa-thin fa-plus"></i> Ajouter</button>
    <?= $this->Html->link(__('Nouveau Sermon'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm mb-3']) ?>
    <div class="table-responsive">
        <table id="scroll-vertical" class="table table-bordered text-nowrap w-100 TableData">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N°') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('topic_id') ?></th>
                    <th><?= $this->Paginator->sort('church_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('verse') ?></th>
                    <th><?= $this->Paginator->sort('contributor') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('createdby') ?></th>
                    <th><?= $this->Paginator->sort('modifiedby') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sermons as $sermon): ?>
                <tr>
                    <td><?= $Number++ ?></td>
                    <td><?= $this->Number->format($sermon->id) ?></td>
                    <td><?= $sermon->hasValue('topic') ? $this->Html->link($sermon->topic->name, ['controller' => 'Topics', 'action' => 'view', $sermon->topic->id]) : '' ?></td>
                    <td><?= $sermon->hasValue('church') ? $this->Html->link($sermon->church->name, ['controller' => 'Churchs', 'action' => 'view', $sermon->church->id]) : '' ?></td>
                    <td><?= h($sermon->title) ?></td>
                    <td><?= h($sermon->verse) ?></td>
                    <td><?= h($sermon->contributor) ?></td>
                    <td><?= h($sermon->created) ?></td>
                    <td><?= h($sermon->modified) ?></td>
                    <td><?= h($sermon->createdby) ?></td>
                    <td><?= h($sermon->modifiedby) ?></td>
                    <td><?= h($sermon->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Details'), ['action' => 'view', $sermon->id], ['class' => 'btn btn-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $sermon->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $sermon->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
        <h5 class="offcanvas-title" id="offcanvasRightLabel1">Nouveau Sermons</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="row">
            <div id="response"></div>
<div class="mt-3">
    <?= $this->Form->create(null, ['id' => 'DataForm']);?>
        <div class="row gy-2">
            <div class="col-xl-12">
                <?= $this->Form->control('topic_id', ['options' => $topics, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'topic_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('church_id', ['options' => $churchs, 'empty' => $emptyText, 'class' => 'form-select js-example-basic-single', 'label' => 'church_id']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('banner', ['class' => 'form-control', 'label' => 'banner']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'title']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('verse', ['class' => 'form-control', 'label' => 'verse']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('summary', ['class' => 'form-control', 'label' => 'summary']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('sermon', ['class' => 'form-control', 'label' => 'sermon']); ?>
            </div>
            <div class="col-xl-12">
                <?= $this->Form->control('contributor', ['class' => 'form-control', 'label' => 'contributor']); ?>
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
                url: '<?= $this->Url->build(["controller" => 'Sermons', 'action' => 'insert']) ?>',
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