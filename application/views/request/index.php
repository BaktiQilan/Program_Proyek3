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
                </div>
                <button href="submit" class="btn btn-success">
                    Jemput
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->