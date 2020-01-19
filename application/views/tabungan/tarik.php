<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('tabungan/tarik'); ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $nasabah['user_id']; ?>" readonly hidden>
                </div>
                <div class="form-group row">
                    <label for="tarik" class="col-sm-1 col-form-label">Rp.</label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" id="tarik" name="tarik">
                        <?= form_error('tarik', '<small class="text-danger pl-3">', '</small>'); ?>
                        <button href="submit" class="btn btn-success">Tarik</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jumlah Penarikan</th>
                    <th scope="col">Tanggal Penarikan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($histori as $h) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $h['penarikan']; ?></td>
                        <td><?= date('d-m-Y', $h['tanggal']); ?></td>
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