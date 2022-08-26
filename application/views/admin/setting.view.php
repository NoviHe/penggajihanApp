<div class="row">
    <div class="col-lg-5">
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
            $data = $data['data'];
        }
        $data = $data[0];
        ?>
        <div class="card shadow mb-4">
            <form action="<?= BASE_PATH ?>/admin/setting/update" method="post">
                <div class="card-header py-3">User Setting</div>
                <div class="card-body">
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <input type="hidden" value="<?= $data['username'] ?>" name="old_username">
                    <input type="hidden" value="<?= $data['password'] ?>" name="old_password2">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" required name="username" value="<?= $data['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="old_password">Password Lama</label>
                        <input type="password" id="old_password" required class="form-control" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" id="password" required class="form-control" name="password">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>