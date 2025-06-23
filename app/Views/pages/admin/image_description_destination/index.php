<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/image_description_destination/create" class="btn btn-primary">+ Add New</a>
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
                                <th>Destination</th>
                                <th>Title (ID)</th>
                                <th>Title (EN)</th>
                                <th>Image</th>
                                <th>Slug</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($images as $image) : ?>
                                <tr>
                                    <td class="text-center"><?= $image['id'] ?></td>
                                    <td><?= $image['destination_name'] ?? $image['destination_id'] ?></td>
                                    <td><?= $image['title_id'] ?></td>
                                    <td><?= $image['title_en'] ?></td>
                                    <td>
                                        <?php if ($image['url']) : ?>
                                            <img src="/assets/images/destinations/<?= $image['url'] ?>" width="80" alt="<?= $image['alt_image'] ?>">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $image['slug'] ?></td>
                                    <td class="text-center">
                                        <a href="/admin/image_description_destination/edit/<?= $image['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/admin/image_description_destination/delete/<?= $image['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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
<?= $this->endSection() ?>