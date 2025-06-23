<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/three_pillars" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <?php if ($pillar['image']) : ?>
                            <div class="text-center">
                                <img src="/assets/images/three_pillars/<?= $pillar['image'] ?>" 
                                     class="img-fluid rounded" 
                                     alt="<?= $pillar['title_en'] ?>">
                                <div class="mt-2">
                                    <small class="text-muted">Image Preview</small>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-warning">No image available</div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-3">Indonesian Content</h4>
                                <div class="mb-3">
                                    <h5>Title</h5>
                                    <p class="p-2 bg-light rounded"><?= $pillar['title_id'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <h5>Description</h5>
                                    <div class="p-3 bg-light rounded">
                                        <?= $pillar['description_id'] ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h4 class="mb-3">English Content</h4>
                                <div class="mb-3">
                                    <h5>Title</h5>
                                    <p class="p-2 bg-light rounded"><?= $pillar['title_en'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <h5>Description</h5>
                                    <div class="p-3 bg-light rounded">
                                        <?= $pillar['description_en'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <h5>Slug</h5>
                                    <p class="p-2 bg-light rounded"><code><?= $pillar['slug'] ?></code></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 border-top pt-3">
                    <a href="/admin/three_pillars/edit/<?= $pillar['id'] ?>" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this pillar? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="admin/three_pillars/delete/<?= $pillar['id'] ?>" method="post">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>