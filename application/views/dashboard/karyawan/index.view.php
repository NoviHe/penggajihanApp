<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-sm btn-primary" href="<?= BASE_PATH ?>/dashboard/karyawan/add">Tambah Data [+]</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>Nama Karyawan</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>role</th>
                        <th width="90px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $d['nama_karyawan'] ?></td>
                            <td><?= $d['nik'] ?></td>
                            <td><?= $d['jenis_kelamin'] ?></td>
                            <td><?= $d['nama_jabatan'] ?></td>
                            <td><?= tgl_indo($d['tanggal_masuk']) ?></td>
                            <td><?= $d['status'] ?></td>
                            <td>
                                <img src="<?= BASE_PATH ?>/public/img/<?= $d['photo'] ?>" width="75px">
                            </td>
                            <td><?= $d['role'] ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= BASE_PATH ?>/dashboard/karyawan/edit/<?= $d['id_karyawan'] ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-info" href="<?= BASE_PATH ?>/dashboard/karyawan/show/<?= $d['id_karyawan'] ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <?php if ($_SESSION['user']['id'] != $d['id_karyawan']) : ?>
                                    <a onclick="return confirm('Data Dihapus?')" class="btn btn-sm btn-danger" href="<?= BASE_PATH ?>/dashboard/karyawan/delete/<?= $d['id_karyawan'] ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>