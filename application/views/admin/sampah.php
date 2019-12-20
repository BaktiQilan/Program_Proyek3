<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger mx-auto" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <?= form_error('admin/sampah', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newSampahModal">Tambah data sampah baru</a>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Sampah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sampah as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['nama']; ?></td>
                            <td><?= $s['harga']; ?></td>
                            <td>
                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editSampahModal<?= $s['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapusS/'), $s['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin ingin dihapus?')">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah -->

<div class="modal fade" id="newSampahModal" tabindex="-1" role="dialog" aria-labelledby="newSampahModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSampahModal">Tambah Data Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=" <?= base_url('admin/sampah'); ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Jenis Sampah">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<?php $i = 0;
foreach ($sampah as $s) : $i++; ?>
    <div class="modal fade" id="editSampahModal<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSampahModal<?= $s['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSampahModal">Edit role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" <?= base_url('admin/editS'); ?> " method="post">
                    <div class="modal-body">
                        <input hidden type="text" value="<?= $s['id']; ?>" class="form-control" id="id" name="id" readonly>
                        <div class="form-group">
                            <input type="text" value="<?= $s['nama']; ?>" class="form-control" id="nama" name="nama" placeholder="Jenis Sampah">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?= $s['harga']; ?>" class="form-control" id="harga" name="harga" placeholder="Harga">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>