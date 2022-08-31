<h2>Danh sách tài khoản</h2>
<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Họ và tên</th>
        <th>Tài khoản</th>
        <th>Số điện thoại</th>
        <th>Vai trò</th>
        <th>Avatar</th>
        <th>
            <a href="<?= ADMIN_URL . 'account/add-form' ?>" class="btn btn-sm btn-success">Tạo mới</a>
        </th>
        <th>Tình Trạng</th>
    </thead>
    <tbody>
        <?php foreach ($dsuser as $u) : ?>
            <tr>
                <td><?= $u['user_id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['user_name'] ?></td>
                <td><?= $u['phone'] ?></td>
                <td><?= $u['role'] ?></td>
                <td>
                    <img src="<?= PUBLIC_ASSETS . 'upload/avatars/' . $u['image'] ?>" width="100">
                </td>
                <td>
                    <a href="<?= ADMIN_URL . 'account/edit-form?id=' . $u['user_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                    <a href="javascript:;" data-url="<?= ADMIN_URL . 'account/delete?id=' . $u['user_id'] ?>" data-name="<?= $u['name'] ?>" class="btn btn-sm btn-danger btn_remove_account">Xóa</a>
                </td>
                <td>
                        <form action="<?= ADMIN_URL . 'account/update-user'?>" method="post" class="d-flex">
                            <select name="active" class="form-control mr-3">
                                <?php
                                    foreach(active as $key => $value) {
                                        if($key == $u['active']){
                                            echo '<option value="'.$key.'" selected>'.$value.'</option>';
                                        }else{
                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="user_id" value="<?= $u['user_id']?>">
                            <button type="submit" name="btn-update-user" class="btn btn-primary">Save</button>
                        </form>

                    </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>