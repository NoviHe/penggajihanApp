<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>Nama Perusahaan</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Alpha</th>
                        <th>Izin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $d) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nama_perusahaan'] ?></td>
                            <td><?= $d['nik'] ?></td>
                            <td> <?= $d['nama_karyawan'] ?></td>
                            <td> <?= $d['jenis_kelamin'] ?></td>
                            <td> <?= $d['nama_jabatan'] ?></td>
                            <td> <?= $d['hadir'] ?></td>
                            <td> <?= $d['sakit'] ?></td>
                            <td> <?= $d['alpha'] ?></td>
                            <td> <?= $d['izin'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>