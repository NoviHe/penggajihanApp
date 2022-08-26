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
        $perusahaan = $data['perusahaan'];
        $data = $data['data'];
        $sl = $data['user_id'];
        ?>
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/admin/jabatan/update" method="post">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Edit User Data</h6> -->
                </div>
                <div class="card-body">
                    <input type="hidden" value="<?= $data['id_jabatan'] ?>" name="id_jabatan">
                    <div class="form-group">
                        <label for="user_id">Nama Perusahaan</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <?php foreach ($perusahaan as $p) : ?>
                                <option value='<?= $p['id_user'] ?>' <?= $sel = ($sl == $p['id_user']) ? 'selected' : '' ?>><?= $p['nama_perusahaan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan</label>
                        <input type="text" id="nama_jabatan" class="form-control" required name="nama_jabatan" value="<?= $data['nama_jabatan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="gaji_pokok">Gaji Pokok</label>
                        <input type="number" id="gaji_pokok" class="form-control" required name="gaji_pokok" value="<?= $data['gaji_pokok'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="transport">Tunjangan Transport</label>
                        <input type="number" id="transport" class="form-control" required name="transport" value="<?= $data['transport'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="uang_makan">Uang Makan</label>
                        <input type="number" id="uang_makan" class="form-control" required name="uang_makan" value="<?= $data['uang_makan'] ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/admin/jabatan">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>