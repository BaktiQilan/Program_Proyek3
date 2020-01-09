<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Nasabah</th>
                    <th scope="col">No. Rekening</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Jemput</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($histori as $h) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $h->name; ?></td>
                        <td><?= $h->no_rek; ?></td>
                        <td><?= $h->alamat; ?></td>
                        <td><?= $h->status; ?></td>
                        <td><?= date('d-m-Y', strtotime($h->tgl_jemput));  ?></td>
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