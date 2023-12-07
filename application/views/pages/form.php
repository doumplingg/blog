<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php if ($error = $this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="<?= @$form->judul ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Penulis</label>
                        <input type="text" class="form-control" name="penulis" value="<?= @$form->penulis ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Utama</label>
                        <input type="file" class="form-control" name="gambar" <?= @$is_required ?>>
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea name="konten" id="" class="form-control summernote" required><?= @$form->konten ?></textarea>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="./blogs?act=list" class="btn btn-secondary">Kembali</a>
                    <?php if (isset($form)) : ?>
                        <input type="submit" name="edit_post" value="Edit Post" class="btn btn-primary">
                    <?php else : ?>
                        <input type="submit" name="add_post" value="Create Post" class="btn btn-primary">
                    <?php endif ?>
                </div>
            </form>
        </div>
    </div>
</div>