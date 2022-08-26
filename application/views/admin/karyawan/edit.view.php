<div class="row">
    <div class="col-lg-9">
        <?php
        if (isset($data['msg'])) {
            foreach ($data['msg'] as $error) {
                echo "<div class='alert alert-danger'>
                <button class='close' type='button' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                $error
            </div>";
            }
            $data = $data['data'];
        }
        $jabatan = $data['jabatan'];
        $data = $data['data'];
        $sl = $data['user_id'];
        $jb = $data['jabatan_id'];
        $jk = $data['jenis_kelamin'];
        $st = $data['status'];
        ?>
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/admin/karyawan/update" method="post" enctype="multipart/form-data">
                <div class="card-header py-3"></div>
                <div class="card-body">
                    <input type="hidden" value="<?= $data['id_karyawan'] ?>" name="id_karyawan">
                    <input type="hidden" value="<?= $data['user_id'] ?>" name="user_id">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" id="nik" class="form-control" required name="nik" value="<?= $data['nik'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" id="nama_karyawan" class="form-control" required name="nama_karyawan" value="<?= $data['nama_karyawan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="Laki-Laki" <?= $sel = ($jk == "Laki-Laki") ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= $sel = ($jk == "Perempuan") ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_id">Nama Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                            <?php foreach ($jabatan as $p) {
                                $njb = $p['id_jabatan'];
                                $s = ($jb == $njb) ? 'selected' : '';
                                echo "<option value='$njb' $s >$p[nama_jabatan]</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" id="tanggal_masuk" class="form-control" required name="tanggal_masuk" value="<?= $data['tanggal_masuk'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Karyawan Tetap" <?= $sel = ($st == "Karyawan Tetap") ? 'selected' : '' ?>>Karyawan Tetap</option>
                            <option value="Karyawan Tidak Tetap" <?= $sel = ($st == "Karyawan Tidak Tetap") ? 'selected' : '' ?>>Karyawan Tidak Tetap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Photo</label>
                        <div class="col-md-12">
                            <img src="<?= BASE_PATH ?>/public/img/<?= $data['photo'] ?>" width="75px" style="margin-bottom: 10px;">
                            <input type="file" class="form-control-file" name="foto" id="foto">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/admin/karyawan">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>