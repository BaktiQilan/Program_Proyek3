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

            <?= form_error('admin/jemput', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>

            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Nasabah</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Jemput</th>
                        <th scope="col">Status</th>
                        <th scope="col">Atur Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jemput as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $j->nama; ?></td>
                            <td><?= $j->alamat; ?></td>
                            <td><?= $j->tgl_jemput; ?></td>
                            <td><?= $j->status; ?></td>
                            <td>
                                <a href="" class="badge badge-info" data-toggle="modal" data-target="#aturPetugasModal<?= $j->id; ?>">atur</a>
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
foreach ($jemput as $j) : $i++; ?>
    <div class="modal fade" id="aturPetugasModal<?= $j->id; ?>" tabindex="-1" role="dialog" aria-labelledby="aturPetugasModal<?= $j->id; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aturPetugasModal">Kirim ke Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" <?= base_url('admin/aturP'); ?> " method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input hidden type="text" value="<?= $j->id; ?>" class="form-control" id="id" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <input hidden type="text" value="<?= $j->id; ?>" class="form-control" id="req_id" name="req_id" readonly>
                        </div>
                        <div class="form-group">
                            <select name="petugas" id="petugas" class="form-control">
                                <option value="">Pilih Petugas</option>
                                <?php foreach ($petugas as $p) : ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Atur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>