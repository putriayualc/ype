<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/travel_memories" class="btn btn-secondary">Back to List</a>
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
                <form action="/admin/travel_memories/update/<?= $memory['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Indonesian Content</h4>
                            <div class="mb-3">
                                <label for="heading_id" class="form-label">Heading (ID)*</label>
                                <input type="text" class="form-control" id="heading_id" name="heading_id" 
                                    value="<?= old('heading_id', $memory['heading_id']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="section_id" class="form-label">Section (ID)</label>
                                <input type="text" class="form-control" id="section_id" name="section_id" 
                                    value="<?= old('section_id', $memory['section_id']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="title_id" class="form-label">Title (ID)*</label>
                                <input type="text" class="form-control" id="title_id" name="title_id" 
                                    value="<?= old('title_id', $memory['title_id']) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">English Content</h4>
                            <div class="mb-3">
                                <label for="heading_en" class="form-label">Heading (EN)*</label>
                                <input type="text" class="form-control" id="heading_en" name="heading_en" 
                                    value="<?= old('heading_en', $memory['heading_en']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="section_en" class="form-label">Section (EN)</label>
                                <input type="text" class="form-control" id="section_en" name="section_en" 
                                    value="<?= old('section_en', $memory['section_en']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Title (EN)*</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" 
                                    value="<?= old('title_en', $memory['title_en']) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="destination_id" class="form-label">Destination*</label>
                                <select class="form-select" id="destination_id" name="destination_id" required>
                                    <option value="">Select Destination</option>
                                    <?php foreach ($destinations as $destination) : ?>
                                        <option value="<?= $destination['id'] ?>" 
                                            <?= ($destination['id'] == old('destination_id', $memory['destination_id'])) ? 'selected' : '' ?>>
                                            <?= $destination['title'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" 
                                    value="<?= old('slug', $memory['slug']) ?>" required>
                                <small class="text-muted">Unique URL identifier</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="image" class="form-label">Current Image</label>
                                <?php if ($memory['image']) : ?>
                                    <img src="/assets/images/travel_memories/<?= $memory['image'] ?>" width="150" class="d-block mb-2">
                                <?php endif; ?>
                                <label for="image" class="form-label">New Image (Leave empty to keep current)</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <small class="text-muted">Max 2MB (JPG, PNG, GIF)</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/admin/travel_memories" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>