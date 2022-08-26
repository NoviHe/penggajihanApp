<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <?php
    require_once ROOT . "/application/functions/function_html.php";
    require_once ROOT . "/application/functions/function_date.php";
    require_once ROOT . "/application/functions/function_rupiah.php";

    load_css('sb-admin-2/vendor/fontawesome-free/css/all.min.css');
    // Custom styles for this template
    load_css('sb-admin-2/css/sb-admin-2.min.css');
    load_css('sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css');
    ?>

</head>

<body id="page-top">
    <center>
        <h1><?= $_SESSION['user']['nama_perusahaan'] ?></h1>
        <h2>Daftar Gaji Pegawai</h2>
    </center>
    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun ?></td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
    <table width="100%">
        <tr>
            <td></td>
            <td width="250px">
                <p><?= $_SESSION['user']['kota'] . ", " . tgl_indo(date('Y-m-d')) ?> <br> Direktur</p>
                <br>
                <br>
                <br>
                <p>(_______________)</p>
            </td>
        </tr>
    </table>

    <?php
    // Bootstrap core JavaScript
    load_script('sb-admin-2/vendor/jquery/jquery.min.js');
    load_script('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js');
    //  Core plugin JavaScript
    load_script('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js');
    // Custom scripts for all pages
    load_script('sb-admin-2/js/sb-admin-2.min.js');
    //Page level plugins
    load_script('sb-admin-2/vendor/datatables/jquery.dataTables.min.js');
    load_script('sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js');
    //Page level custom scripts
    load_script('sb-admin-2/js/demo/datatables-demo.js');
    ?>
    <script>
        window.print();
    </script>
</body>

</html>