<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/banner_homepage" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form action="/admin/banner_homepage/store" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title_id" class="form-label">Title (ID)*</label>
                                <input type="text" class="form-control" id="title_id" name="title_id" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Title (EN)*</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" required>
                                <small class="text-muted">Unique identifier for the banner</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="url" class="form-label">URL*</label>
                                <input type="url" class="form-control" id="url" name="url" required>
                                <small class="text-muted">Full URL including http:// or https://</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/admin/banner_homepage" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>