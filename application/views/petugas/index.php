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

            <?= form_error('petugas/', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>
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
                        <th scope="col">Petugas</th>\
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
                            <td><?= $a->petugas; ?></td>
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