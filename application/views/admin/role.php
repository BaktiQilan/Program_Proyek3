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

            <?= form_error('admin/role', '<div class="alert alert-danger mx-auto" role="alert">', '</div>') ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah role baru</a>

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editRoleModal<?= $r['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapus/'), $r['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin ingin dihapus?')">delete</a>
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

<!-- Modal Tambah -->

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModal">Tambah role baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=" <?= base_url('admin/role'); ?> " method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role">
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

<!-- Modal Edit-->
<?php $i = 0;
foreach ($role as $r) : $i++; ?>
    <div class="modal fade" id="editRoleModal<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleModal<?= $r['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModal">Edit role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" <?= base_url('admin/edit'); ?> " method="post">
                    <div class="modal-body">
                        <input hidden type="text" value="<?= $r['id']; ?>" class="form-control" id="id" name="id" readonly>
                        <div class="form-group">
                            <input type="text" value="<?= $r['role']; ?>" class="form-control" id="role" name="role" placeholder="Nama Role">
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