<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/image_description_destination" class="btn btn-secondary">Back to List</a>
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
                <form action="/admin/image_description_destination/update/<?= $image['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="destination_id" class="form-label">Destination*</label>
                                <select class="form-select" id="destination_id" name="destination_id" required>
                                    <option value="">Select Destination</option>
                                    <?php foreach ($destinations as $destination) : ?>
                                        <option value="<?= $destination['id'] ?>" 
                                            <?= ($destination['id'] == $image['destination_id']) ? 'selected' : '' ?>>
                                            <?= $destination['title'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="title_id" class="form-label">Title (ID)*</label>
                                <input type="text" class="form-control" id="title_id" name="title_id" 
                                    value="<?= old('title_id', $image['title_id']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Title (EN)*</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" 
                                    value="<?= old('title_en', $image['title_en']) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" 
                                    value="<?= old('slug', $image['slug']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alt_image" class="form-label">Alt Text</label>
                                <input type="text" class="form-control" id="alt_image" name="alt_image" 
                                    value="<?= old('alt_image', $image['alt_image']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Current Image</label>
                                <?php if ($image['url']) : ?>
                                    <img src="/assets/images/destinations/<?= $image['url'] ?>" class="img-fluid mb-2" style="max-width: 200px;">
                                    <input type="hidden" name="current_image" value="<?= $image['url'] ?>">
                                <?php endif; ?>
                                <label for="image" class="form-label mt-2">New Image (Leave blank to keep current)</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/admin/image_description_destination" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>