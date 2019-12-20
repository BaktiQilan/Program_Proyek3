<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">

            <?= form_error('menu', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Menu Baru</a>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editMenuModal<?= $m['id']; ?>">edit</a>
                                <a href="<?= base_url('menu/hapus/'), $m['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin ingin dihapus?')">delete</a>
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

<!-- Modal add -->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModal">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=" <?= base_url('menu'); ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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

<!-- Modal edit-->
<?php $i = 0;
foreach ($menu as $m) : $i++; ?>
    <div class="modal fade" id="editMenuModal<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editnewMenuModal<?= $m['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModal">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/edit'); ?>" method="post">
                    <div class="modal-body">
                        <input type="text" readonly value="<?= $m['id']; ?>" class="form-control" id="id" name="id">
                        <div class="form-group">
                            <input type="text" value="<?= $m['menu']; ?>" autocomplete="off" class="form-control" id="menu" name="menu" placeholder="Menu name">
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