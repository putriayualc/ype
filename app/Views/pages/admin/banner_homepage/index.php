<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0"><?= $title ?></h1>
            </div>
            <div class="col-auto">
                <a href="/admin/banner_homepage/create" class="btn btn-primary">+ Add New</a>
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
                                <th>Slug</th>
                                <th>URL</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($banners as $banner) : ?>
                                <tr>
                                    <td class="text-center"><?= $banner['id'] ?></td>
                                    <td><?= $banner['title_id'] ?></td>
                                    <td><?= $banner['title_en'] ?></td>
                                    <td><?= $banner['slug'] ?></td>
                                    <td>
                                        <a href="<?= $banner['url'] ?>" target="_blank">View Link</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/banner_homepage/edit/<?= $banner['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/admin/banner_homepage/delete/<?= $banner['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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