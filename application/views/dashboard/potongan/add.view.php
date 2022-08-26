<div class="row">
    <div class="col-lg-9">
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
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/dashboard/potongan/insert" method="post">
                <div class="card-header py-3"></div>
                <div class="card-body">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                    <div class="form-group">
                        <label for="alpha">Aplha</label>
                        <input type="number" id="alpha" class="form-control" required name="alpha">
                    </div>
                    <div class="form-group">
                        <label for="izin">Izin</label>
                        <input type="number" id="izin" class="form-control" required name="izin">
                    </div>
                    <div class="form-group">
                        <label for="sakit">Sakit</label>
                        <input type="number" id="sakit" class="form-control" required name="sakit">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="float-right btn btn-warning" href="<?= BASE_PATH ?>/dashboard/potongan">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>