<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Sampah</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($info as $o) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $o['nama']; ?></td>
                        <td><?= $o['harga']; ?></td>
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