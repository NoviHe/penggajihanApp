<?php if (isset($_SESSION['user']['kota']) == null) : ?>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/dashboard/setting/updateUser" method="post">
                <div class="card-header py-3">Lengkapi Data terlebih dahulu</div>
                <div class="card-body">
                    <input type="hidden" value="<?= $_SESSION['user']['user_id'] ?>" name="id_user">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" class="form-control" required name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" id="kota" class="form-control" required name="kota">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update Data</button>
                </div>
            </form>
        </div>
    </div>
<?php else : ?>
    <?php if ($_SESSION['user']['role'] == 'Karyawan') : $data = $data['data'][0]; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center"><?= $_SESSION['user']['nama_perusahaan'] ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-thumbnail rounded mx-auto d-block" width="250px" src="<?= BASE_PATH ?>/public/img/<?= $data['photo'] ?>" alt="">
                                <br>
                                <table class="table">
                                    <tr>
                                        <td>Username :</td>
                                        <td>
                                            <b><?= $data['username'] ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password :</td>
                                        <td><b><?= $data['password'] ?></b></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <td width="150px">Nama Karyawan</td>
                                                <td width="10px">:</td>
                                                <td><?= $data['nama_karyawan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="150px">NIK</td>
                                                <td width="10px">:</td>
                                                <td><?= $data['nik'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="150px">Jenis Kelamin</td>
                                                <td width="10px">:</td>
                                                <td><?= $data['jenis_kelamin'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="150px">Jabatan</td>
                                                <td width="10px">:</td>
                                                <td><?= $data['nama_jabatan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td width="150px">Tanggal Masuk</td>
                                                <td width="10px">:</td>
                                                <td><?= tgl_indo($data['tanggal_masuk']) ?></td>
                                            </tr>
                                            <tr>
                                                <td width="150px">Status</td>
                                                <td width="10px">:</td>
                                                <td><?= $data['status'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data Karyawan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['jlmkaryawan'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Jabatan
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $data['jlmjabatan'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Data Kehadiran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data['jlmabsensi'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>



<?php if ($_SESSION['user']['role'] == 'Pimpinan') : ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Get Started as Pimpinan</h6>
                </div>
                <div class="card-body">
                    <p>Selamat datang di Aplikasi Penggajian App, Aplikasi untuk mengatur penggajian karyawan secara mudah.</p>
                    <p class="mb-0">Sebelum menggunakan nya pastikan untuk menambah Admin di Data Karyawan untuk dijadikan Admin.</p>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($_SESSION['user']['role'] == 'Admin') : ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Get Started as Admin</h6>
                </div>
                <div class="card-body">
                    <p>Selamat datang di Aplikasi Penggajian App, Aplikasi untuk mengatur penggajian karyawan secara mudah.</p>
                    <p class="mb-0">Silahkan Gunakan Aplikasi ini dengan sebaik nya admin mampu mengakses semua fitur aplikasi, enjoy.</p>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Get Started as Karyawan</h6>
                </div>
                <div class="card-body">
                    <p>Selamat datang di Aplikasi Penggajian App, Aplikasi untuk mengatur penggajian karyawan secara mudah.</p>
                    <!-- <p class="mb-0">Sebelum menggunakan nya pastikan untuk menambah Admin di Data Karyawan untuk dijadikan Admin.</p> -->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>