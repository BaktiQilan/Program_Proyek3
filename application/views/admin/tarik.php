<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">


            <?= form_error('admin/tarik', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Nasabah</th>
                        <th scope="col">Jumlah Penarikan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Konfirmasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penarikan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p->nama; ?></td>
                            <td><?= $p->penarikan; ?></td>
                            <td><?= date('d-m-Y', $p->tanggal); ?></td>
                            <td><?= $p->status; ?></td>
                            <td>
                                <a href="" class="badge badge-info" data-toggle="modal" data-target="#aturPenarikanModal<?= $p->id; ?>">Setujui</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusPenarikanModal<?= $p->id; ?>">Hapus</a>
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
<!-- Modal Edit-->
<?php $i = 0;
foreach ($penarikan as $p) : $i++; ?>
    <div class="modal fade" id="aturPenarikanModal<?= $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="aturPenarikanModal<?= $p->id; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aturPenarikanModal">Penarikan Saldo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" <?= base_url('admin/saldoTarik'); ?> " method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input hidden type="text" value="<?= $p->id; ?>" class="form-control" id="id" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <input hidden type="text" value="<?= $p->user_id; ?>" class="form-control" id="user_id" name="user_id" readonly>
                        </div>
                        <div class="form-group row">
                            <label for="penarikan" class="col-sm-4 col-form-label">Jumlah Penarikan</label>
                            <div class="col-lg-7">
                                <input type="text" value="<?= $p->penarikan; ?>" class="form-control" id="penarikan" name="penarikan" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nasabah" class="col-sm-4 col-form-label">Nama Nasabah</label>
                            <div class="col-lg-7">
                                <input type="text" value="<?= $p->nama; ?>" class="form-control" id="nasabah" name="nasabah" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Modal Hapus-->
<?php $i = 0;
foreach ($penarikan as $p) : $i++; ?>
    <div class="modal fade" id="hapusPenarikanModal<?= $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPenarikanModal<?= $p->id; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusPenarikanModal">Hapus Penarikan Saldo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('admin/hapusTarik'); ?>">
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus data penarikan <b><?= $p->nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input hidden name="id" value="<?= $p->id;; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>