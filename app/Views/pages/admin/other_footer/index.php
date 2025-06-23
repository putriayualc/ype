<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>

<div class="tab-content" id="orders-table-tab-content">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Other Footer Settings</h1>
                </div>
                <div class="col-auto">
                    <a href="/admin/other_footer/create/" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add Other Footer
                    </a>
                </div>
            </div>

            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Title (ID)</th>
                                        <th class="text-center">Title (EN)</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($footers as $footer) : ?>
                                        <tr>
                                            <td class="text-center"><?= $footer['id'] ?></td>
                                            <td><?= $footer['title_id'] ?></td>
                                            <td><?= $footer['title_en'] ?></td>
                                            <td><code><?= $footer['slug'] ?></code></td>
                                            <td class="text-center">
                                                <a href="/admin/other_footer/detail/<?= $footer['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                                                <a href="/admin/other_footer/edit/<?= $footer['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/admin/other_footer/delete/<?= $footer['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this footer content? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="post">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // JavaScript to handle the delete modal
            document.addEventListener('DOMContentLoaded', function() {
                var deleteModal = document.getElementById('deleteModal');
                var deleteForm = document.getElementById('deleteForm');

                deleteModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var id = button.getAttribute('data-id');
                    deleteForm.action = '/admin/other_footer/delete/' + id;
                });
            });
        </script>
    </div><!--//app-content-->
</div>

<?= $this->endSection() ?>