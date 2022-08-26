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
        <h2>Slip Gaji Karyawan</h2>
        <hr style="width: 50%; border-width: 5px; color: black;">
    </center>
    <?php
    $alpha = $data['potongan']['alpha'];
    $izin = $data['potongan']['izin'];
    $sakit = $data['potongan']['sakit'];
    ?>
    <?php $no = 1;
    foreach ($data['data'] as $d) : ?>
        <table class="font-weight-bold text-dark" style="width: 100%;">
            <tr>
                <td width="20%">Nama Karyawan</td>
                <td width="2%">:</td>
                <td><?= $d['nama_karyawan'] ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $d['nik'] ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $d['nama_jabatan'] ?></td>
            </tr>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= substr($d['bulan'], 0, -4) ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= substr($d['bulan'], 2) ?></td>
            </tr>
        </table>
        <br>
        <?php $potongan = ($alpha * $d['alpha']) + ($izin * $d['izin']) + ($sakit * $d['sakit']) ?>
        <?php $total = $d['gaji_pokok'] + $d['transport'] + $d['uang_makan'] - $potongan ?>
        <table class="table table-bordered table-striped" id="" width="100%" cellspacing="0">

            <tr class="text-center">
                <th width="3%">No</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Pokok</td>
                <td><?= format_rupiah($d['gaji_pokok']) ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tunjangan Transportasi</td>
                <td><?= format_rupiah($d['transport']) ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Uang Makan</td>
                <td><?= format_rupiah($d['uang_makan']) ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Potongan</td>
                <td><?= format_rupiah($potongan) ?></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: right;">Total Gaji</th>
                <th><?= format_rupiah($total) ?></th>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td></td>
                <td>
                    <p>Karyawan</p>
                    <br>
                    <br>
                    <p class="font-weight-bold"><?= $d['nama_karyawan'] ?></p>
                </td>
                <td width="250px">
                    <p><?= $_SESSION['user']['kota'] . ", " . tgl_indo(date('Y-m-d')) ?> <br> Direktur</p>
                    <br>
                    <br>
                    <br>
                    <p>(_______________)</p>
                </td>
            </tr>
        </table>

    <?php endforeach ?>
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