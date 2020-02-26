<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('data/index'); ?>
            <div class="form-group">
                <div class="col-lg-8">
                    <input hidden type="text" class="form-control" id="id" name="id" value="<?= $detail['id']; ?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-8">
                    <input hidden type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nomor Rekening</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="rek" name="rek" value="<?= $detail['no_rek']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $detail['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $detail['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">Upload Scan KTP</div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/scan/ktp/') . $detail['scan_ktp'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fotoktp" name="fotoktp">
                                <label class="custom-file-label" for="fotoktp">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">Upload Scan KK</div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/scan/kk/') . $detail['scan_kk'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fotokk" name="fotokk">
                                <label class="custom-file-label" for="fotokk">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <small id="note" class="form-text text-danger">
                        *file hasil scan yang diupload hanya ber-format png atau jpg. minimal resolusi 800px
                    </small>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-lg-10">
                    <button type="submit" id="btn_edit" class="btn btn-success">Edit</button>
                </div>
            </div>

            </form>


        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->