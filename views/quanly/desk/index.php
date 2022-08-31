<button><a href="<?= ADMIN_URL . 'desk/add-form' ?>" class="btn btn-sm btn-success">Tạo mới</a></button>
<h2>Danh sách bàn</h2>
<table class="table table-stripped">
    <thead>
        <th>Mã bàn</th>
        <th>Tên bàn</th>
        <th>Tầng</th>
        <th>Sức chứa</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
        <th>Tình trạng</th>
    </thead>
    <tbody>
        <?php foreach ($desks as $d) : ?>
            <tr>
                <td><?= $d['desk_id'] ?></td>
                <td><?= $d['desk_name'] ?></td>
                <td><?= $d['location'] ?></td>
                <td><?= $d['capacity'] ?></td>
                <td><?= $d['status'] ?></td>
                <td>
                    <a href="<?= ADMIN_URL . 'desk/edit-form?desk_id=' . $d['desk_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                    <a href="<?= ADMIN_URL . 'desk/delete?desk_id=' . $d['desk_id'] ?>" class="btn btn-sm btn-danger btn_remove_account">Xóa</a>
                </td>
                <th>
                <form action="<?= ADMIN_URL . 'desk/update-desk' ?>" method="post" class="d-flex">
                        <select name="active" class="form-control mr-3">
                            <?php
                            foreach (active as $key => $value) {
                                if ($key == $d['active']) {
                                    echo '<option value="' . $key . '" selected>' . $value . '</option>';
                                } else {
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <input type="hidden" name="desk_id" value="<?= $d['desk_id'] ?>">
                        <button type="submit" name="btn-update-desk" class="btn btn-primary">Save</button>
                    </form>
                </th>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>