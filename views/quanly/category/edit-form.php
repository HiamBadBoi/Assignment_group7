<form action="<?= ADMIN_URL . 'category/edit-submit?id=' . $category['category_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" value="<?= $category['category_name'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Category Name</label>
            </div>
            <div class="form-floating mb-3">
                <div>
                    <img src="<?= IMAGE_URL . 'icon/' . $category['icon'] ?>" width="250">
                </div>
                <input type="file" class="form-control" name="image" id="" placeholder="name@example.com">
                <label for="floatingInput">Icon</label>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="<?= ADMIN_URL . 'category' ?>" class="btn btn-lg btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
            </div>
        </div>
    </div>
</form>