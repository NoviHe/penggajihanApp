<div class="col-lg-5 mx-auto">
    <?php
    if (isset($data['msg'])) {
        foreach ($data['msg'] as $error) {
            echo "<div class='alert alert-danger'>
        <button class='close' type='button' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
        </button>
        $error
    </div>";
        }
    } ?>
    <div class="card ">
        <div class=" card-header bg-primary text-white text-center">
            Filter Laporan Gaji Karyawan
        </div>
        <form action="<?= BASE_PATH ?>/dashboard/laporangaji/cetak" method="POST" target="_blank">
            <div class="card-body">
                <div class="form-group row">
                    <label for="bulan" class="col-sm-6 col-form-label">Masukan Bulan: </label>
                    <div class="col-sm-6">
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
                </div>
                <div class="form-group row">
                    <label for="bulan" class="col-sm-6 col-form-label">Masukan Tahun: </label>
                    <div class="col-sm-6">
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">-- Pilih Tahun --</option>
                            <?php $tahun = date('Y');
                            for ($i = 2021; $i < $tahun + 5; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button style="width: 100%;" type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Laporan Gaji</button>
            </div>
        </form>
    </div>
</div>