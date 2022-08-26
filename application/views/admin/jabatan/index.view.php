<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3"></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>Perusahaan</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tj. Transportasi</th>
                        <th>Uang Makan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $d['nama_perusahaan'] ?></td>
                            <td><?= $d['nama_jabatan'] ?></td>
                            <td>Rp. <?= format_rupiah($d['gaji_pokok']) ?></td>
                            <td>Rp. <?= format_rupiah($d['transport']) ?></td>
                            <td>Rp. <?= format_rupiah($d['uang_makan']) ?></td>
                            <td>Rp. <?= format_rupiah($d['gaji_pokok'] + $d['transport'] + $d['uang_makan']) ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= BASE_PATH ?>/admin/jabatan/edit/<?= $d['id_jabatan'] ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Data Dihapus?')" class="btn btn-danger" href="<?= BASE_PATH ?>/admin/jabatan/delete/<?= $d['id_jabatan'] ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
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