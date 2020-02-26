<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('request/'); ?>" method="post">
                <div class="form-group">
                    <input hidden type="text" class="form-control" id="user_id" name="user_id" value="<?= $nasabah['user_id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input hidden type="text" class="form-control" id="alamatt" name="alamatt" value="<?= $nasabah['alamat']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                    <small id="note" class="form-text text-danger">
                        *minimal berat sampah yang akan dijemput 1 kg.
                    </small>
                </div>
                <button href="submit" class="btn btn-success">
                    Jemput
                </button>
            </form>
        </div>

        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Penjemputan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($histori as $h) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= date('d-m-Y', strtotime($h['tgl_jemput'])); ?></td>
                        <td><?= $h['status']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->