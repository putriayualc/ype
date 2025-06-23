<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Add New Image Destination</h1>
            </div>
            <div class="col-auto">
                <a href="/admin/image_destination" class="btn btn-secondary">Back to List</a>
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
                <form action="/admin/image_destination/store" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="destination_id" class="form-label">Destination*</label>
                                <select class="form-select" id="destination_id" name="destination_id" required>
                                    <option value="">Select Destination</option>
                                    <?php foreach ($destinations as $destination) : ?>
                                        <option value="<?= $destination['id'] ?>" 
                                            <?= old('destination_id') == $destination['id'] ? 'selected' : '' ?>>
                                            <?= $destination['title'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image_name_id" class="form-label">Title (ID)*</label>
                                <input type="text" class="form-control" id="image_name_id" name="image_name_id" 
                                    value="<?= old('image_name_id') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="image_name_en" class="form-label">Title (EN)*</label>
                                <input type="text" class="form-control" id="image_name_en" name="image_name_en" 
                                    value="<?= old('image_name_en') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" 
                                    value="<?= old('slug') ?>" required>
                                <small class="text-muted">Unique identifier for the URL</small>
                            </div>
                            <div class="mb-3">
                                <label for="alt_image" class="form-label">Alt Text</label>
                                <input type="text" class="form-control" id="alt_image" name="alt_image" 
                                    value="<?= old('alt_image') ?>">
                                <small class="text-muted">Alternative text for accessibility</small>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image*</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                                <small class="text-muted">Recommended size: 1200x800 pixels</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Save Image</button>
                        <a href="/admin/image_destination" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>