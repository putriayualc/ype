<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/target_market" class="btn btn-secondary">Back to List</a>
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
                <form action="/admin/target_market/update/<?= $market['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Indonesian Content</h4>
                            <div class="mb-3">
                                <label for="title_id" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="title_id" name="title_id" value="<?= old('title_id', $market['title_id']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description_id" class="form-label">Description</label>
                                <textarea class="form-control" id="description_id" name="description_id" rows="3"><?= old('description_id', $market['description_id']) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">English Content</h4>
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" value="<?= old('title_en', $market['title_en']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description_en" class="form-label">Description</label>
                                <textarea class="form-control" id="description_en" name="description_en" rows="3"><?= old('description_en', $market['description_en']) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="<?= old('slug', $market['slug']) ?>" required>
                                <small class="text-muted">Unique URL identifier (lowercase, hyphens instead of spaces)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Current Image</label>
                                <?php if ($market['image']) : ?>
                                    <img src="/assets/images/target_market/<?= $market['image'] ?>" width="150" class="d-block mb-2">
                                <?php endif; ?>
                                <label for="image" class="form-label">New Image (Leave empty to keep current)</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <small class="text-muted">Max 2MB (JPG, PNG, GIF)</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/admin/target-market" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>