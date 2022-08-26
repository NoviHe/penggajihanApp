<?php if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $bulantahun = $bulan . $tahun;
} else {
    $bulan = date('m');
    $tahun = date('Y');
    $bulantahun = $bulan . $tahun;
} ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        Filter Data Gaji Karyawan
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
            <button type="submit" class="btn btn-primary mb-2 ml-auto">Tampil Data</button>
            <?php $jlm_data = count($data['data']);
            if ($jlm_data > 0) : ?>
                <a class="btn mb-2 ml-2 btn-success" target="_blank" href="<?= BASE_PATH . "/dashboard/penggajian/cetak?bulan=$bulan&tahun=$tahun" ?>"><i class="fa fa-print"></i> Cetak Daftar Gaji</a>
            <?php else : ?>
                <button type="button" class="btn mb-2 ml-2 btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-print"></i> Cetak Daftar Gaji
                </button>
            <?php endif; ?>

        </form>
    </div>
</div>

<div class='alert alert-info'>
    Menampilkan Data Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?= $bulan ?></span> Tahun: <span class="font-weight-bold"><?= $tahun ?></span>
</div>

<?php if ($jlm_data <= 0) {
    echo "<div class='alert alert-danger'>
                <button class='close' type='button' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
                <i class='fa fa-info-circle'></i> Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang anda pilih
            </div>";
} ?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tj. Transport</th>
                        <th>Uang Makan</th>
                        <th>Potongan</th>
                        <th>Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $alpha = $data['potongan']['alpha'];
                    $izin = $data['potongan']['izin'];
                    $sakit = $data['potongan']['sakit'];
                    $no = 1;
                    foreach ($data['data'] as $d) {
                        $potongan = ($d['alpha'] * $alpha) + ($d['izin'] * $izin) +  ($d['sakit'] * $sakit);
                        $total = $d['gaji_pokok'] + $d['transport'] + $d['uang_makan'] - $potongan; ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nik'] ?></td>
                            <td> <?= $d['nama_karyawan'] ?></td>
                            <td> <?= $d['jenis_kelamin'] ?></td>
                            <td> <?= $d['nama_jabatan'] ?></td>
                            <td> <?= format_rupiah($d['gaji_pokok'])  ?></td>
                            <td> <?= format_rupiah($d['transport']) ?></td>
                            <td> <?= format_rupiah($d['uang_makan']) ?></td>
                            <td> <?= format_rupiah($potongan) ?></td>
                            <td> <?= format_rupiah($total) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data gaji masih kosong, silahkan input absensi terlebih dahulu pada bulan dan tahun yang anda pilih.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>