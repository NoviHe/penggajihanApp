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
        $data = $data[0];
        ?>
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/admin/user/update" method="post">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Edit User Data</h6> -->
                </div>
                <input type="hidden" value="<?= $data['id_user'] ?>" name="id_user">
                <input type="hidden" value="<?= $data['password'] ?>" name="old_password2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_company">Nama Perusahaan</label>
                        <input type="text" id="nama_company" class="form-control" required name="nama_company" value="<?= $data['nama_perusahaan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input type="text" id="nama_pemilik" class="form-control" required name="nama_pemilik" value="<?= $data['nama_pemilik'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" required name="email" value="<?= $data['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" required readonly name="username" value="<?= $data['username'] ?>">
                    </div>
                    <span class="text-xs">Kosongkan bila tidak ingin merubah password</span>
                    <div class="form-group">
                        <label for="old_password">Password Lama</label>
                        <input type="password" id="old_password" class="form-control" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/admin/user">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>