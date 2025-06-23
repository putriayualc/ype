<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/image_destination/create" class="btn btn-primary">+ Add New Image</a>
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
                                <th>Destination ID</th>
                                <th>Image</th>
                                <th>Title (ID)</th>
                                <th>Title (EN)</th>
                                <th>Slug</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($images as $image) : ?>
                                <tr>
                                    <td class="text-center"><?= $image['id'] ?></td>
                                    <td><?= $image['title'] ?></td>
                                    <td>
                                        <?php if ($image['image']) : ?>
                                            <img src="/assets/images/destinations/<?= $image['image'] ?>" alt="<?= $image['alt_image'] ?>" style="max-width: 100px; height: auto;">
                                        <?php else : ?>
                                            No Image
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $image['image_name_id'] ?></td>
                                    <td><?= $image['image_name_en'] ?></td>
                                    <td><?= $image['slug'] ?></td>
                                    <td class="text-center">
                                        <a href="/admin/image_destination/edit/<?= $image['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/admin/image_destination/delete/<?= $image['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
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