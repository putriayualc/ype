
<?= $this->extend('adminLayout/template') ?>

<?= $this->section('content') ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit detail coporate agent</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="card-body">

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Error</h4>
                            <p><?php echo session()->getFlashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('proses_edit_detail_corporate_agent/' . $all_data_detail_corporate_agent['id']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Title id<br><span class="custom-color custom-label"></span></label>
                                   
                                    <textarea class="form-control tiny" id="title_id" name="title_id"><?=$all_data_detail_corporate_agent['title_id']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Title En <br><span class="custom-color custom-label"></span></label>
                                   
                                    <textarea class="form-control tiny" id="title_en" name="title_en"><?=$all_data_detail_corporate_agent['title_en']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Descriptio Id <br><span class="custom-color custom-label"></span></label>
                                   
                                    <textarea class="form-control tiny" id="description_id" name="description_id"><?=$all_data_detail_corporate_agent['description_id']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description En <br><span class="custom-color custom-label"></span></label>
                                    
                                    <textarea class="form-control tiny" id="description_en" name="description_en"><?=$all_data_detail_corporate_agent['description_en']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar</label>
                                    <br>
                                    <img width="150px" class="img-thumbnail" src="<?= base_url() . "assets/images/detail_corporate_agent/" . $all_data_detail_corporate_agent['image']; ?>">
                                    <input class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : '' ?>" type="file" id="image" name="image">
                                    <?= $validation->getError('image') ?>
                                    
                                </div>
                                <p>*File maksimal berukuran 2 Mb</p>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col">
                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--//app-card-->
        </div><!--//row-->
 <?= $this->endSection() ?>