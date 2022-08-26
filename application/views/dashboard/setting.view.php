<?php if ($_SESSION['user']['role'] == 'Pimpinan') : ?>
    <div class="row">
        <div class="col-lg-8">
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
                <form action="<?= BASE_PATH ?>/dashboard/setting/update" method="post">
                    <div class="card-header py-3">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">Edit User Data</h6> -->
                    </div>
                    <input type="hidden" value="<?= $data['id_user'] ?>" name="id_user">
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
                            <label for="alamat">Alamat</label>
                            <input type="alamat" id="alamat" class="form-control" required name="alamat" value="<?= $data['alamat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="kota" id="kota" class="form-control" required name="kota" value="<?= $data['kota'] ?>">
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/dashboard">Batal</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <form action="<?= BASE_PATH ?>/dashboard/setting/updatePassword" method="post">
                    <div class="card-header py-3"></div>
                    <div class="card-body">
                        <input type="hidden" value="<?= $data['id_user'] ?>" name="id_user">
                        <input type="hidden" value="<?= $data['username'] ?>" name="old_username">
                        <input type="hidden" value="<?= $data['password'] ?>" name="old_password2">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" required name="username" value="<?= $data['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input type="password" id="old_password" required class="form-control" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" id="password" required class="form-control" name="password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-lg-8">
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
            $jk = $data['jenis_kelamin'];
            $st = $data['status'];
            ?>
            <div class="card shadow mb-4">
                <form action="<?= BASE_PATH ?>/dashboard/setting/update2" enctype="multipart/form-data" method="post">
                    <div class="card-header py-3"></div>
                    <input type="hidden" value="<?= $data['id_karyawan'] ?>" name="id_karyawan">
                    <input type="hidden" value="<?= $data['user_id'] ?>" name="user_id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan</label>
                                    <input type="text" id="nama_karyawan" class="form-control" required name="nama_karyawan" value="<?= $data['nama_karyawan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" id="nik" class="form-control" required name="nik" value="<?= $data['nik'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="Laki-Laki" <?= $sel = ($jk == "Laki-Laki") ? 'selected' : '' ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?= $sel = ($jk == "Perempuan") ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Photo">Photo</label>
                                    <img src="<?= BASE_PATH ?>/public/img/<?= $data['photo'] ?>" class="img-thumbnail" width="250px">
                                    <hr>
                                    <input type="file" class="form-control-file" name="foto" id="foto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/dashboard">Batal</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <?php
            $readonly =  ($_SESSION['user']['role'] == 'Admin') ? '' : 'readonly';
            ?>
            <div class="card shadow mb-4">
                <form action="<?= BASE_PATH ?>/dashboard/setting/updatePassword2" method="post">
                    <div class="card-header py-3"></div>
                    <div class="card-body">
                        <input type="hidden" value="<?= $data['id_karyawan'] ?>" name="id_karyawan">
                        <input type="hidden" value="<?= $data['username'] ?>" name="old_username">
                        <input type="hidden" value="<?= $data['password'] ?>" name="old_password2">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" required <?= $readonly ?> name="username" value="<?= $data['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input type="password" id="old_password" required class="form-control" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" id="password" required class="form-control" name="password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>