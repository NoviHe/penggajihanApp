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
        } ?>
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/dashboard/jabatan/insert" method="post">
                <div class="card-header py-3"></div>
                <div class="card-body">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan</label>
                        <input type="text" id="nama_jabatan" class="form-control" required name="nama_jabatan">
                    </div>
                    <div class="form-group">
                        <label for="gaji_pokok">Gaji Pokok</label>
                        <input type="number" id="gaji_pokok" class="form-control" required name="gaji_pokok">
                    </div>
                    <div class="form-group">
                        <label for="transport">Tunjangan Transport</label>
                        <input type="number" id="transport" class="form-control" required name="transport">
                    </div>
                    <div class="form-group">
                        <label for="uang_makan">Uang Makan</label>
                        <input type="number" id="uang_makan" class="form-control" required name="uang_makan">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/dashboard/jabatan">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>