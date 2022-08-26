<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class=" btn btn-sm btn-primary" href="<?= BASE_PATH ?>/admin/user/add">Tambah Data [+]</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>Username</th>
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
                            <td><?= $d['nama_pemilik'] ?></td>
                            <td><?= $d['email'] ?></td>
                            <td><?= $d['username'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= BASE_PATH ?>/admin/user/edit/<?= $d['id_user'] ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Data Dihapus?')" class="btn btn-danger" href="<?= BASE_PATH ?>/admin/user/delete/<?= $d['id_user'] ?>">
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