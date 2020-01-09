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

            <?= form_error('admin/aktivasi', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No. Rekening</th>
                        <th scope="col">Nama Nasabah</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Scan KTP</th>
                        <th scope="col">Scan Kartu Keluarga</th>
                        <th scope="col">Aktivasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($aktivasi as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['no_rek']; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['alamat']; ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/scan/ktp/') . $a['scan_ktp'] ?>" class="img-thumbnail">
                            </td>
                            <td>
                                <img src="<?= base_url('assets/img/scan/kk/') . $a['scan_kk'] ?>" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="<?= base_url('admin/editrek/'), $a['id']; ?>" class="badge badge-primary">Aktifkan</a>
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