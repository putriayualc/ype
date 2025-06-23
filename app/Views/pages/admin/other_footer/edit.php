<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/other_footer" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form action="/admin/other_footer/update/<?= $footer['id'] ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Indonesian Content</h4>
                            <div class="mb-3">
                                <label for="seo_tag_title_id" class="form-label">SEO Title</label>
                                <input type="text" class="form-control" id="seo_tag_title_id" name="seo_tag_title_id" value="<?= old('seo_tag_title_id', $footer['seo_tag_title_id']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="seo_description_id" class="form-label">SEO Description</label>
                                <textarea class="form-control" id="seo_description_id" name="seo_description_id" rows="3"><?= old('seo_description_id', $footer['seo_description_id']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="title_id" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="title_id" name="title_id" value="<?= old('title_id', $footer['title_id']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="desc_id" class="form-label">Description</label>
                                <textarea class="form-control" id="desc_id" name="desc_id" rows="5"><?= old('desc_id', $footer['desc_id']) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">English Content</h4>
                            <div class="mb-3">
                                <label for="seo_tag_title_en" class="form-label">SEO Title</label>
                                <input type="text" class="form-control" id="seo_tag_title_en" name="seo_tag_title_en" value="<?= old('seo_tag_title_en', $footer['seo_tag_title_en']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="seo_description_en" class="form-label">SEO Description</label>
                                <textarea class="form-control" id="seo_description_en" name="seo_description_en" rows="3"><?= old('seo_description_en', $footer['seo_description_en']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Title*</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" value="<?= old('title_en', $footer['title_en']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="desc_en" class="form-label">Description</label>
                                <textarea class="form-control" id="desc_en" name="desc_en" rows="5"><?= old('desc_en', $footer['desc_en']) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug*</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="<?= old('slug', $footer['slug']) ?>" required>
                                <small class="text-muted">Unique URL identifier (lowercase, hyphens instead of spaces)</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Content</button>
                        <a href="/admin/other-footer" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>