<h2>Danh mục</h2>
<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Icon</th>
        <th>
            <a href="<?= ADMIN_URL . 'category/add-form' ?>" class="btn btn-sm btn-success">Tạo mới</a>
        </th>
        <th>Tình Trạng</th>
    </thead>
    <tbody>
        <?php foreach ($list_category as $u) : ?>
            <tr>
                <td><?= $u['category_id'] ?></td>
                <td><?= $u['category_name'] ?></td>
                <td>
                    <img src="<?= PUBLIC_ASSETS . 'upload/icon/' . $u['icon'] ?>" width="100">
                </td>
                <td>
                    <a href="<?= ADMIN_URL . 'category/edit-form?id=' . $u['category_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                    <a href="javascript:;" data-url="<?= ADMIN_URL . 'category/delete?id=' . $u['category_id'] ?>" data-name="<?= $u['category_name'] ?>" class="btn btn-sm btn-danger btn_remove_category">Xóa</a>
                </td>
                <th>
                <form action="<?= ADMIN_URL . 'category/update-category' ?>" method="post" class="d-flex">
                        <select name="active" class="form-control mr-3">
                            <?php
                            foreach (active as $key => $value) {
                                if ($key == $u['active']) {
                                    echo '<option value="' . $key . '" selected>' . $value . '</option>';
                                } else {
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <input type="hidden" name="category_id" value="<?= $u['category_id'] ?>">
                        <button type="submit" name="btn-update-category" class="btn btn-primary">Save</button>
                    </form>
                </th>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>