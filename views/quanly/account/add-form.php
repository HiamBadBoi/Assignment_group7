<form action="<?= ADMIN_URL . 'account/add-submit' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Fullname</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user_name" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="phone" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Phone</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="role" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Role</label>
            </div>
            <label for="floatingInput" class="ml-2">Avatar</label>
            <input type="file" class="form-control" name="image" id="" placeholder="Password" required>
            <div class="d-flex justify-content-center mt-3">
                <a href="<?= ADMIN_URL . 'account' ?>" class="btn btn-lg btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
            </div>
        </div>
    </div>
</form>