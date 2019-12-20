<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="card-body">
                <div class="col-md-3">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text"><?= $user['name']; ?></p>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']);  ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->