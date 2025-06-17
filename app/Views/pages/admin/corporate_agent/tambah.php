<?= $this->extend('adminLayout/template') ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Corporate Agent</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/corporate_agent/store') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Heading (ID)</label>
                                <input type="text" class="form-control" id="heading_id" name="heading_id" value="<?= old('heading_id') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Heading (EN)</label>
                                <input type="text" class="form-control" id="heading_en" name="heading_en" value="<?= old('heading_en') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Section (IN)</label>
                                <input type="text" class="form-control" id="section_id" name="section_id" value="<?= old('section_id') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Section (EN)</label>
                                <input type="text" class="form-control" id="section_en" name="section_en" value="<?= old('section_en') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title (IN)</label>
                                <input type="text" class="form-control" id="title_id" name="title_id" value="<?= old('title_id') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title (EN)</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" value="<?= old('title_en') ?>">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->

        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content'); ?>