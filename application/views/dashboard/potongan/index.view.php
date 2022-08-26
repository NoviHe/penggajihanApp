<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php if (count($data) == 0) : ?>
            <a class="btn btn-sm btn-primary" href="<?= BASE_PATH ?>/dashboard/potongan/add">Tambah Data [+]</a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>Alpha</th>
                        <th>Izin</th>
                        <th>Sakit</th>
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
                            <td>Rp. <?= format_rupiah($d['alpha']) ?></td>
                            <td>Rp. <?= format_rupiah($d['izin']) ?></td>
                            <td>Rp. <?= format_rupiah($d['sakit']) ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= BASE_PATH ?>/dashboard/potongan/edit/<?= $d['id_potongan'] ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Data Dihapus?')" class="btn btn-danger" href="<?= BASE_PATH ?>/dashboard/potongan/delete/<?= $d['id_potongan'] ?>">
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