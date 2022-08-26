<?php
$data = $data[0];
// var_dump($data);
?>
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
            <div class="card-footer">
                <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/dashboard/karyawan">Batal</a>
            </div>
        </div>
    </div>
</div>