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

            <?= form_error('petugas/input', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Penjemputan</th>
                        <th scope="col">No. Rekening</th>
                        <th scope="col">Nama Nasabah</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ambil as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a->tgl_jemput; ?></td>
                            <td><?= $a->no_rek; ?></td>
                            <td><?= $a->nama; ?></td>
                            <td><?= $a->alamat; ?></td>
                            <td><?= $a->status; ?></td>
                            <td>
                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#newAmbilModal<?= $a->id; ?>">Ambil sekarang</a>
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

<!-- Modal Input Data Sampah Nasabah -->

<?php $i = 0;
foreach ($ambil as $b) : $i++; ?>
    <div class="modal fade" id="newAmbilModal<?= $b->id; ?>" tabindex="-1" role="dialog" aria-labelledby="newAmbilModal<?= $b->id; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newAmbilModal<?= $b->id; ?>">Masukan data-data Nasabah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('petugas/input'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input hidden type="text" value="<?= $b->req_id; ?>" readonly class="form-control" id="req_id" name="req_id">
                        </div>
                        <div class="form-group">
                            <input hidden type="text" value="<?= $b->id; ?>" readonly class="form-control" id="id" name="id">
                        </div>
                        <div class="form-group">
                            <label for="j_sampah">Jenis Sampah</label>
                            <select name="j_sampah" id="j_sampah" class="form-control">
                                <option value="">Pilih Jenis Sampah</option>
                                <?php foreach ($petugas as $p) : ?>
                                    <option value="<?= $p['harga'] ?>"><?= $p['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('j_sampah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="b_sampah">Berat Sampah (kg)</label>
                            <input type="text" class="form-control" id="b_sampah" name="b_sampah">
                            <?= form_error('b_sampah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="j_sampah2">Jenis Sampah</label>
                            <select name="j_sampah2" id="j_sampah2" class="form-control">
                                <option value="">Pilih Jenis Sampah</option>
                                <?php foreach ($petugas as $p) : ?>
                                    <option value="<?= $p['harga'] ?>"><?= $p['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('j_sampah2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="b_sampah2">Berat Sampah (kg)</label>
                            <input type="text" class="form-control" id="b_sampah2" name="b_sampah2">
                            <?= form_error('b_sampah2', '<small class="text-danger pl-3">', '</small>'); ?>
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
<?php endforeach; ?>