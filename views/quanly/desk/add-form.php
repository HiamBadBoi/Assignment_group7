<form action="<?= ADMIN_URL . 'desk/add-submit' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-group form-floating">
                <input type="text" name="desk_name" id="" class="form-control" placeholder="">
                <label for="floatingInput">Tên bàn</label>
            </div>
            <div class="form-group form-floating"> 
                <input type="text" name="capacity" id="" class="form-control" placeholder="">
                <label for="floatingInput">Sức chứa</label>
            </div>
            <div class="form-group form-floating">  
                <input type="text" name="location" id="" class="form-control" placeholder="">
                <label for="floatingInput">Vị trí (Tầng)</label>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'desk' ?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-sm">Thêm mới</button>
            </div>
        </div>
    </div>
</form>