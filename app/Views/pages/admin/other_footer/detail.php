<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Footer Content Detail</h1>
            </div>
            <div class="col-auto">
                <a href="/admin/other_footer" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4 class="mb-3">Indonesian Content</h4>
                        <div class="mb-3">
                            <h5>SEO Title</h5>
                            <p class="p-2 bg-light rounded"><?= $footer['seo_tag_title_id'] ?? '-' ?></p>
                        </div>
                        <div class="mb-3">
                            <h5>SEO Description</h5>
                            <p class="p-2 bg-light rounded"><?= $footer['seo_description_id'] ?? '-' ?></p>
                        </div>
                        <div class="mb-3">
                            <h5>Title</h5>
                            <p class="p-2 bg-light rounded"><?= $footer['title_id'] ?></p>
                        </div>
                        <div class="mb-3">
                            <h5>Description</h5>
                            <div class="p-3 bg-light rounded">
                                <?= $footer['desc_id'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-3">English Content</h4>
                        <div class="mb-3">
                            <h5>SEO Title</h5>
                            <p class="p-2 bg-light rounded"><?= $footer['seo_tag_title_en'] ?? '-' ?></p>
                        </div>
                        <div class="mb-3">
                            <h5>SEO Description</h5>
                            <p class="p-2 bg-light rounded"><?= $footer['seo_description_en'] ?? '-' ?></p>
                        </div>
                        <div class="mb-3">
                            <h5>Title</h5>
                            <p class="p-2 bg-light rounded"><?= $footer['title_en'] ?></p>
                        </div>
                        <div class="mb-3">
                            <h5>Description</h5>
                            <div class="p-3 bg-light rounded">
                                <?= $footer['desc_en'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <h5>Slug</h5>
                            <p class="p-2 bg-light rounded"><code><?= $footer['slug'] ?></code></p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 text-end">
                    <a href="/admin/other-footer/edit/<?= $footer['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/admin/other-footer" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>