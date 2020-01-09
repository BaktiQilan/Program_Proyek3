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

            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Setoran</th>
                        <th scope="col">Penarikan</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tabungan as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= date('d-m-Y', $t['tanggal']);  ?></td>
                            <td><?= $t['setoran']; ?></td>
                            <td><?= $t['penarikan']; ?></td>
                            <td></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="table-success text-center" colspan="4">Saldo</th>
                        <td class="table-success"><?= $total; ?></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->