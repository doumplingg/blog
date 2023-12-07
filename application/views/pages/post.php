<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <small>Ditulis oleh <?=$post->penulis?> (<?=$post->tgl_posting?>)</small>
            </div>
            <div class="card-body">
            <?php if($success = $this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                <?=$success?>
                </div>
            <?php endif ?>
                <div class="row">
                    <div class="col text-center">
                        <img alt="image" src="assets/img/thumbnail/<?=$post->gambar_utama?>" width="300"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?=$post->konten?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="section-body">
                            <h2 class="section-title">Komentar</h2>
                                <form method="post" id="add_comment">
                                    <div class="row border mt-3">
                                        <input type="hidden" name="id" value="<?=$post->id_post?>">
                                        <div class="col-8 m-4">
                                            <div class="form-group">
                                                <label>Isi</label>
                                                <textarea name="comment" id="comment_content" class="summernote-simple" style="display: none;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-3 m-4 d-flex flex-column justify-content-between">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama_comment" value="<?=@$form->penulis?>" required>
                                            </div>
                                            <div class="form-group text-right">
                                                <input type="submit" name="add_comment" value="Tambahkan Komentar" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <div class="row border py-2 bg-light">
                            <div class="col-12">
                                <div class="activities" id="comments">
                                    <?php foreach($comments as $comment): ?>
                                    <div class="activity">
                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fas fa-comment-alt"></i>
                                        </div>
                                        <div class="activity-detail">
                                        <div class="mb-2">
                                            <a class="text-job"><?=$comment->nama?></a>
                                            <span class="bullet"></span>
                                            <span class="text-job text-primary"><?=$comment->tgl_comment?></span>
                                            <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Pilihan</div>
                                                <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-1" data-confirm="Apakah yakin ingin menghapus komentar ini?" data-confirm-text-yes="Ya" data-confirm-yes="window.location='.?act=delcomment&id=<?=$comment->id_comment?>&post=<?=$post->id_post?>'"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            </div>
                                            </div>
                                        </div>
                                            <?=$comment->comment?>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>