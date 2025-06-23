<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/three_pillars/create" class="btn btn-primary">+ Add New</a>
            </div>
        </div>

        <?php if (session()->has('message')) : ?>
            <div class="alert alert-success">
                <?= session('message') ?>
            </div>
        <?php endif; ?>

        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Title (ID)</th>
                                <th>Title (EN)</th>
                                <th>Image</th>
                                <th>Slug</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pillars as $pillar) : ?>
                                <tr>
                                    <td class="text-center"><?= $pillar['id'] ?></td>
                                    <td><?= $pillar['title_id'] ?></td>
                                    <td><?= $pillar['title_en'] ?></td>
                                    <td>
                                        <?php if ($pillar['image']) : ?>
                                            <img src="/assets/images/three_pillars/<?= $pillar['image'] ?>" width="80" alt="Pillar Image">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $pillar['slug'] ?></td>
                                    <td class="text-center">
                                        <a href="/admin/three_pillars/detail/<?= $pillar['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                                        <a href="/admin/three_pillars/edit/<?= $pillar['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal<?= $pillar['id'] ?>">
                                            Delete
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<?php foreach ($pillars as $pillar) : ?>
    <div class="modal fade" id="deleteModal<?= $pillar['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $pillar['id'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel<?= $pillar['id'] ?>">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?= base_url('admin/three_pillars/delete/') . $pillar['id'] ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?= $this->endSection() ?>