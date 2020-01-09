<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Nasabah</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Jemput</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($histori as $h) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $h->nama; ?></td>
                            <td><?= $h->alamat; ?></td>
                            <td><?= $h->tgl_jemput; ?></td>
                            <td><?= $h->status; ?></td>
                            <td></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</div>