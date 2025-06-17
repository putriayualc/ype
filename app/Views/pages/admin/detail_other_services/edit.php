<?= $this->extend('adminLayout/template') ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Detail Other Services</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('admin/detail_other_services/update/' . $detail['id']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="POST">

                        <div class="mb-3">
                            <label class="form-label">Image</label><br>
                            <?php if (!empty($detail['image'])): ?>
                                <img src="<?= base_url('assets/images/detail_other_services/' . $detail['image']) ?>" alt="Current Image" width="350" class="mb-2"><br>
                            <?php endif; ?>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title (ID)</label>
                            <input type="text" class="form-control" id="title_id" name="title_id" value="<?= old('title_id', $detail['title_id']) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="<?= old('title_en', $detail['title_en']) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description (ID)</label>
                            <input type="text" class="form-control" id="description_id" name="description_id" value="<?= old('description_id', $detail['description_id']) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description (EN)</label>
                            <input type="text" class="form-control" id="description_en" name="description_en" value="<?= old('description_en', $detail['description_en']) ?>">
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                            <div class="col">
                                <a href="<?= base_url('admin/detail_other_services') ?>" class="btn btn-secondary">Kembali</a>
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