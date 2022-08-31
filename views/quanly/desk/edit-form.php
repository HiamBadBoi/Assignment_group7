<form action="<?= ADMIN_URL . 'desk/edit-submit?desk_id=' . $desks['desk_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            
            <div class="form-group">
                <label for="">Tên bàn</label>
                <input type="text" name="desk_name" id="" value="<?= $desks['desk_name'] ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Sức chứa</label>
                <input type="text" name="capacity" id="" value="<?= $desks['capacity'] ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Vị trí (Tầng)</label>
                <input type="text" name="location" id="" value="<?= $desks['location'] ?>" class="form-control" placeholder="">
            </div>
            <br>
            <div class="d-flex justify-content-center">
            <a href="<?= ADMIN_URL . 'desk' ?>" class="btn btn-lg btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
            </div>
        </div>
    </div>
</form>