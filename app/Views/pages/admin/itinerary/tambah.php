<?= $this->extend('adminLayout/template') ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Itinerary</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">
                    <form action="<?= base_url('admin/itinerary/store') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Destination</label>
                                <select class="form-select" id="destination_slug" name="destination_slug">
                                    <option value="" hidden></option>
                                    <?php foreach ($allDestination as $key => $destination) : ?>
                                        <option value="<?= $destination['slug'] ?>"><?= $destination['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Day</label>
                                <input type="number" class="form-control" id="day" name="day" value="<?= old('day') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title (ID)</label>
                                <input type="text" class="form-control" id="title_id" name="title_id" value="<?= old('title_id') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Title (EN)</label>
                                <input type="text" class="form-control" id="title_en" name="title_en" value="<?= old('title_en') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description (ID)</label>
                                <input type="text" class="form-control" id="description_id" name="description_id" value="<?= old('description_id') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description (EN)</label>
                                <input type="text" class="form-control" id="description_en" name="description_en" value="<?= old('description_en') ?>">
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