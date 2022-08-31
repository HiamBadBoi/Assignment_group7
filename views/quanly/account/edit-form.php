<form action="<?= ADMIN_URL . 'account/edit-submit?id=' . $user['user_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user_name" value="<?= $user['user_name'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">User name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Phone</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="role" value="<?= $user['role'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Role</label>
            </div>
            <div class="form-floating mb-3">
                <div>
                    <img src="<?= IMAGE_URL . 'avatars/' . $user['image'] ?>" width="250">
                </div>
                <input type="file" class="form-control" name="image" id="" placeholder="name@example.com">
                <label for="floatingInput">Ảnh đại diện</label>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="<?= ADMIN_URL . 'account' ?>" class="btn btn-lg btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
            </div>
        </div>
    </div>
</form>