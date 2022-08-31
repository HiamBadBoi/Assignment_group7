<?php
const active = [
    '0' => "Hết loại",
    '1' => "Còn loại"
];
function list_category()
{
    $sql = 'select*from category';
    $list_category = pdo_query($sql);
    admin_render('category/index.php', [
        'list_category' => $list_category
    ], ['category/category.js']);
}

function add_form()
{
    admin_render('category/add-form.php');
}

function category_submit_add()
{
    $category_name = $_POST['name'];
    $file = $_FILES['image'];
    $image = "";

    if ($file['size'] > 0) {
        $filename = $file['name'];
        move_uploaded_file($file['tmp_name'], './public/upload/icon/' . $filename);
        $image = $filename;
    }

    $sql = "insert into category 
    (category_name,icon) values 
    ('$category_name','$image')";

    executeQuery($sql);
    header("location: " . ADMIN_URL . 'category');
}

function category_edit_form()
{
    $id = $_GET['id'];
    $sql = "select * from category where category_id = $id";
    $category = executeQuery($sql, false);
    admin_render('category/edit-form.php', [
        'category' => $category
    ]);
}

function category_save_edit()
{
    $id = $_GET['id'];
    $sql = "select * from category where category_id=$id";
    $oldData = executeQuery($sql, false);

    $category_name = $_POST['name'];

    $file = $_FILES['image'];
    $image = $oldData['image'];

    if ($file['size'] > 0) {
        $filename = $file['name'];
        move_uploaded_file($file['tmp_name'], './public/upload/icon/' . $filename);
        $image = $filename;
    }

    $sql = "update category set category_name = '$category_name',
        icon = '$image'
        where category_id = $id";

    executeQuery($sql);
    header("location:" . ADMIN_URL . 'category');
}

function category_remove()
{
    $id = $_GET['id'];
    $sql = "delete from category where category_id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'category');
}

function update_category() {
    if (isset($_POST['btn-update-category'])) {
        $category_id = $_POST['category_id'];
        $active = $_POST['active'];
        $sql = "update category set active='$active' where category_id=$category_id"; 
        pdo_execute($sql);
        header("location:". ADMIN_URL . 'category');
    }
}