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
        } ?>
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/dashboard/karyawan/insert" method="post" enctype="multipart/form-data">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Tambah User Data</h6> -->
                </div>
                <div class="card-body">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" placeholder="" id="nik" class="form-control" required name="nik">
                    </div>
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" placeholder="" id="nama_karyawan" class="form-control" required name="nama_karyawan">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jabatan_id">Nama Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control" required>
                            <?php if ($data['jabatan'] == null) :
                                echo "<option value=''>TAMBAH KAN TERLEBIH DAHULU DATA JABATAN</option>";
                            else : ?>
                                <option value="">- Pilih -</option>
                            <?php endif; ?>
                            <?php foreach ($data['jabatan'] as $p) {
                                echo "<option value='$p[id_jabatan]'>$p[nama_jabatan]</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" id="tanggal_masuk" class="form-control" required name="tanggal_masuk">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="Karyawan Tetap">Karyawan Tetap</option>
                            <option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">Photo</label>
                        <input type="file" class="form-control-file" name="foto" id="foto" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username Karyawan</label>
                        <input type="text" placeholder="" id="username" class="form-control" required name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Karyawan</label>
                        <input type="text" placeholder="" id="password" class="form-control" required name="password">
                    </div>
                    <div class="form-group">
                        <label for="role">Hak Akses</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/dashboard/karyawan">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>