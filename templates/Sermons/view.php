<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sermon $sermon
 */
$this->set('title_2', 'Prédications');
?>

<!-- Start::row-1 -->
<div class="row">
    <div class="col-xxl-9">
        <div class="card bg-primary-transparent">
            <div class="card-body">
                <div class="card custom-card overflow-hidden job-info-banner">
                </div>
                <div class="card custom-card job-info-data mb-2">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-top justify-content-between gap-2">
                            <div>
                                <div class="d-flex flex-wrap gap-2">
                                    <div>
                                        <span class="avatar avatar-lg border p-1">
                                            <?= $this->Html->image('bible.jpg') ?>
                                        </span>
                                    </div>
                                    <div>
                                        <h5 class="fw-medium mb-0 d-flex align-items-center"><a href="javascript:void(0);" class=""><?= h($sermon->title) ?></a></h5>
                                        <a href="javascript:void(0);" class="fs-12 text-muted"><i class="bi bi-building"></i> <?= $sermon->hasValue('church') ? $this->Html->link($sermon->church->name, ['controller' => 'Churchs', 'action' => 'view', $sermon->church->id]) : '' ?></a>
                                        <div class="d-flex mt-3">
                                            <div>
                                                <p class="mb-1"><i class="bi bi-geo-alt me-1"></i><?= $sermon->church->address ?></p>
                                                <p><i class="ri-calendar-event-line me-1"></i><?= $sermon->created ?></p>
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-1"><i class="ri-book-open-line me-1"></i><span class="fw-medium"><?= h($sermon->verse) ?></span></p>
                                                <p><i class="ri-git-repository-line me-1"></i><?= $sermon->hasValue('topic') ? $this->Html->link($sermon->topic->name, ['controller' => 'Topics', 'action' => 'view', $sermon->topic->id]) : '' ?></p>
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-1"><i class="ri-user-voice-line me-1"></i><span class="fw-medium"><?= h($sermon->contributor) ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end ms-auto">
                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Save" class="rounded-pill btn btn-icon btn-primary-light btn-wave btn-sm">
                                    <i class="ri-bookmark-line"></i>
                                </a>
                                <div class="d-flex gap-2 flex-wrap mt-3 justify-content-end">
                                    <a href="javascript:void(0);" class="btn mb-0 btn-icon btn-primary1-light btn-wave">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn mb-0 btn-icon btn-primary2-light btn-wave me-0">
                                        <i class="ri-share-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h6 class="fw-medium">
                            <strong>Sommaire</strong>
                        </h6>
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($sermon->summary)); ?>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="card custom-card">
            <div class="card-body">
                <div class="row">
                    <h5>
                        <strong><?= __('Prédications') ?></strong>
                    </h5>
                    <blockquote class="text-justify">
                        <?= $this->Text->autoParagraph(h($sermon->sermon)); ?>
                    </blockquote>
                </div>

                <div class="related">
                    <h5>
                        <strong><?= __('Versets de meditation') ?></strong>
                    </h5>
                    <?php if (!empty($sermon->verses)) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th><?= __('Verset') ?></th>
                                    <th><?= __('Description') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($sermon->verses as $verse) : ?>
                                    <tr>
                                        <td><?= h($verse->title) ?></td>
                                        <td><?= h($verse->description) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Details'), ['controller' => 'Verses', 'action' => 'view', $verse->id], ['class' => 'btn btn-success btn-sm']) ?>
                                            <?= $this->Html->link(__('Editer'), ['controller' => 'Verses', 'action' => 'edit', $verse->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                            <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Verses', 'action' => 'delete', $verse->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="related">
                    <h5>
                        <strong><?= __('Medias') ?></strong>
                    </h5>
                    <?php if (!empty($sermon->medias)) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th><?= __('Name') ?></th>
                                    <th><?= __('Description') ?></th>
                                    <th><?= __('Url') ?></th>
                                    <th><?= __('Media type') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($sermon->medias as $media) : ?>
                                    <tr>
                                        <td><?= h($media->name) ?></td>
                                        <td><?= h($media->description) ?></td>
                                        <td><?= h($media->url) ?></td>
                                        <td><?= h($media->mediatype) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Details'), ['controller' => 'Medias', 'action' => 'view', $media->id], ['class' => 'btn btn-success btn-sm']) ?>
                                            <?= $this->Html->link(__('Editer'), ['controller' => 'Medias', 'action' => 'edit', $media->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                            <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Medias', 'action' => 'delete', $media->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Voulez-vous supprimer cette information ?')]) ?>
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
</div>
<!-- End::row-1 -->

<div class="col-xl-12">
    <div class="card custom-card overflow-hidden">
        <div class="card-header">
            <div class="card-title">
                COMMENTS
            </div>
        </div>
        <div class="card-body p-0">
            <?php if (!empty($sermon->comments)) : ?>
            <ul class="list-group list-group-flush" id="blog-details-comment-list">
                <?php foreach ($sermon->comments as $comment) : ?>
                <li class="list-group-item border-0">
                    <div class="d-flex align-items-start gap-3 flex-wrap">
                        <div>
                            <span class="avatar avatar-lg avatar-rounded">
                                <?= $this->Html->image('avatar.png') ?>
                            </span>
                        </div>
                        <div class="flex-fill w-50">
                            <span class="fw-medium d-block mb-1">
                                <?= h($comment->name) ?>
                                <span class="text-muted">
                                    <i><?= h($comment->created) ?></i>
                                </span>
                            </span>
                            <span class="d-block mb-3"><?= h($comment->comment) ?></span>
                            <div class="btn-list">
                                <button class="btn btn-sm btn-primary-light btn-wave">Repondre<i class="ri-reply-line ms-1"></i></button>
                                <button class="btn btn-sm btn-primary1-light btn-wave">Rapporter<i class="ri-error-warning-line ms-1"></i></button>
                            </div>
                        </div>
                        <div class="btn-list">
                            <button class="btn btn-icon btn-sm btn-primary2-light btn-wave"><i class="ri-thumb-up-line"></i></button>
                            <button class="btn btn-icon btn-sm btn-primary3-light btn-wave"><i class="ri-thumb-down-line"></i></button>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            Pas de commentaires pour le moment, soyez le premier à laisser un commentaire !
            <?php endif; ?>
        </div>
    </div>
</div>



<div class="col-xl-12">
    <?= $this->Form->create(null, ['id' => 'DataForm']);?>
    <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">
                Laisser un commentaire
            </div>
        </div>
        <div class="card-body">
            <div class="row gy-3">
                <div class="col-xl-6">
                    <label for="blog-first-name" class="form-label">Nom</label>
                    <?= $this->Form->control('name', ['placeholder' => 'Entrer votre nom', 'class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="col-xl-6">
                    <label for="blog-email" class="form-label">Email</label>
                    <?= $this->Form->control('email', ['placeholder' => 'Entrer votre Email', 'class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="col-xl-12">
                    <label for="blog-comment" class="form-label">Votre Commentaire</label>
                    <?= $this->Form->control('comment', ['type' => 'textarea', 'placeholder' => 'Votre commentaire ici...' , 'class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-end">
                <?= $this->Form->button(__('Poster'), ['class'=>'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function() {
        $('#DataForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            // Get form data
            var formData = $(this).serialize();

            // Perform AJAX request
            $.ajax({
                url: '<?= $this->Url->build(["controller" => 'Comments', 'action' => 'insert', $sermon->id]) ?>',
                method: 'POST',
                data: formData,
                dataType: 'json', // Expecting JSON in the response
                success: function(response) {
                    console.log(response.data); // Log the JSON response
                    $('#response').html('<div class="alert alert-success rounded-pill alert-dismissible fade show mb-1 mt-2">' + response.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button> </div>'); // Show success message
                    var newRow = '<tr>';
                    newRow += '<td>'+''+'</td>'; // Add your actions
                    newRow += '</tr>';

                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any error
                    $('#response').html('<p>An error occurred. Please try again.</p>');
                }
            });
        });
    });
</script>
