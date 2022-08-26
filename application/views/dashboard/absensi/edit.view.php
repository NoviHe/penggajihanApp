<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Edit Data Absensi Karyawan
    </div>
    <div class="card-body">
        <form class="form-inline">
            <div class="form-group mb-2">
                <label for="bulan" class="mr-2">Bulan : </label>
                <select name="bulan" id="bulan" class="form-control">
                    <option value="">-- Pilih Bulan --</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">Noveber</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="tahun" class="mr-2">Tahun : </label>
                <select name="tahun" id="tahun" class="form-control">
                    <option value="">-- Pilih Tahun --</option>
                    <?php $tahun = date('Y');
                    for ($i = 2021; $i < $tahun + 5; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-auto">Generate</button>
        </form>
    </div>
</div>

<?php if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $bulantahun = $bulan . $tahun;
} else {
    $bulan = date('m');
    $tahun = date('Y');
    $bulantahun = $bulan . $tahun;
} ?>

<div class='alert alert-info'>
    Menampilkan Data Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?= $bulan ?></span> Tahun: <span class="font-weight-bold"><?= $tahun ?></span>
</div>

<?php $jlm_data = count($data);
if ($jlm_data > 0) { ?>
    <form action="<?= BASE_PATH ?>/dashboard/absensi/update" method="POST">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="submit" name="submit" value="submit" class="btn btn-success">Update</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>NIK</th>
                                <th>Nama Karyawan</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th width="8%">Hadir</th>
                                <th width="8%">Sakit</th>
                                <th width="8%">Alpha</th>
                                <th width="8%">Izin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $d) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['nik'] ?> <input type="hidden" name="id_absensi[]" value="<?= $d['id_absensi'] ?>"> </td>
                                    <td> <?= $d['nama_karyawan'] ?></td>
                                    <td> <?= $d['jenis_kelamin'] ?></td>
                                    <td> <?= $d['nama_jabatan'] ?></td>
                                    <td><input type="number" name="hadir[]" class="form-control" value="<?= $d['hadir'] ?>" required></td>
                                    <td><input type="number" name="sakit[]" class="form-control" value="<?= $d['sakit'] ?>" required></td>
                                    <td><input type="number" name="alpha[]" class="form-control" value="<?= $d['alpha'] ?>" required></td>
                                    <td><input type="number" name="izin[]" class="form-control" value="<?= $d['izin'] ?>" required></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
<?php } else {
    echo "<div class='alert alert-danger'>
            <button class='close' type='button' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <i class='fa fa-info-circle'></i> Bulan dan Tahun yang anda pilih sudah di proses
        </div>";
} ?>