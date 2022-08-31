<form action="<?= ADMIN_URL . 'food/edit-submit?id=' . $food['food_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" value="<?= $food['food_name'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="price" value="<?= $food['price'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Price</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="category_id" value="<?= $food['category_id'] ?>" id="" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Category</label>
            </div>
            <div class="form-floating mb-3">
                <div>
                    <img src="<?= IMAGE_URL . 'food/' . $food['image'] ?>" width="250">
                </div>
                <input type="file" class="form-control" name="image" id="" placeholder="name@example.com">
                <label for="floatingInput">Ảnh đại diện</label>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="<?= ADMIN_URL . 'food' ?>" class="btn btn-lg btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
            </div>
        </div>
    </div>
</form>