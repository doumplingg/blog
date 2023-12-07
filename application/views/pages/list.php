<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if ($success = $this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= $success ?>
                    </div>
                <?php endif ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr class="text-center">
                                <th class="text-center pt-2" width="25">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Ditulis Sejak</th>
                            </tr>
                            <?php foreach ($posts as $post) : ?>
                                <tr class="text-center">
                                    <td width="25">
                                        <div class="custom-checkbox custom-control text-center">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="blogs?act=post&id=<?= $post->id_post ?>" class="d-flex align-items-center">
                                            <img alt="image" src="assets/img/thumbnail/<?= $post->gambar_utama ?>" class="rounded-circle float-left" width="100" data-toggle="title" title="">
                                            <div class="mx-auto"><?= $post->judul ?></div>
                                        </a>
                                        <div class="table-links">
                                            <a href="blogs?act=post&id=<?= $post->id_post ?>">View</a>
                                            <div class="bullet"></div>
                                            <a href="blogs?act=edit&id=<?= $post->id_post ?>">Edit</a>
                                            <div class="bullet"></div>
                                            <a href="blogs?act=delete&id=<?= $post->id_post ?>" class="text-danger delete-post">Trash</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a>
                                            <div class="d-inline-block ml-1"><?= $post->penulis ?></div>
                                        </a>
                                    </td>
                                    <td><?= $post->tgl_posting ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>