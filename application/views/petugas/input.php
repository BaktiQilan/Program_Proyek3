<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>

            <form action="" method="post" id="forminput">
                <div class="form-group">
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="">Pilih Jenis Sampah</option>
                        <?php foreach ($petugas as $p) : ?>
                            <option value="<?= $p['nama'] ?>"><?= $p['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="norek">No. Rekening Nasabah</label>
                    <input type="text" class="form-control" id="norek" name="norek">
                    <?= form_error('norek', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="berat">Berat Sampah(kg)</label>
                    <input type="number" class="form-control" id="berat" name="berat">
                    <?= form_error('berat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="button" name="btn" value="Masukan data" id="submitBtn" class="btn btn-success" data-toggle="modal" data-target="#konfirmasiModal"></input>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal konfirmasi -->

<div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi
            </div>
            <div class="modal-body">Apakah data sudah benar ?
                <table class="table">
                    <tr>
                        <th>Jenis Sampah</th>
                        <td id="kjenis"></td>
                    </tr>
                    <tr>
                        <th>No. Rekening Nasabah</th>
                        <td id="knorek"></td>
                    </tr>
                    <tr>
                        <th>Berat Sampah (kg)</th>
                        <td id="kberat"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="submit" class="btn btn-success">Ya</a>
            </div>
        </div>
    </div>
</div>