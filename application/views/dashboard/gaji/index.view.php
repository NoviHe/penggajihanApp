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
                        <th>Bulan/Tahun</th>
                        <th>Gaji Pokok</th>
                        <th>Tj. Transport</th>
                        <th>Uang Makan</th>
                        <th>Potongan</th>
                        <th>Total Gaji</th>
                        <th>Cetak Slip</th>
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
                            <td><?= $d['bulan'] ?></td>
                            <td> <?= format_rupiah($d['gaji_pokok'])  ?></td>
                            <td> <?= format_rupiah($d['transport']) ?></td>
                            <td> <?= format_rupiah($d['uang_makan']) ?></td>
                            <td> <?= format_rupiah($potongan) ?></td>
                            <td> <?= format_rupiah($total) ?></td>
                            <td>
                                <center>
                                    <a target="_blank" href="<?= BASE_PATH ?>/dashboard/gaji/cetak/<?= $d['id_absensi'] ?>" class="btn btn-primary"><i class="fa fa-print"></i></a>
                                </center>
                            </td>
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