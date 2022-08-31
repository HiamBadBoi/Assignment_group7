<form action="<?= ADMIN_URL . 'food/add-submit' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="price" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Price</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="category_id" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Category</label>
            </div>
            <label for="floatingInput" class="ml-2">Image</label>
            <input type="file" class="form-control" name="image" id="" placeholder="Password" required>
            <div class="d-flex justify-content-center mt-3">
                <a href="<?= ADMIN_URL . 'food' ?>" class="btn btn-lg btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
            </div>
        </div>
    </div>
</form>