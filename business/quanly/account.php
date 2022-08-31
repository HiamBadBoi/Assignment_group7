<?php
 const active = [
    '0' => "Tạm khóa",
    '1' => "Đã kích hoạt"
];
function user_index()
{
    $sql = "select * from user";
    $user = pdo_query($sql);

    admin_render(
        'account/index.php',
        [
            'dsuser' => $user,
        ],
        [
            'account/list.js'
        ]
    );
}
function user_add_form()
{
    admin_render('account/add-form.php');
}

function user_submit_add()
{
    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $file = $_FILES['image'];
    $image = "";

    if ($file['size'] > 0) {
        $filename = $file['name'];
        move_uploaded_file($file['tmp_name'], './public/upload/avatars/' . $filename);
        $image = $filename;
    }

    $sql = "insert into user 
    (name,user_name,password,phone,role,image) values 
    ('$name', '$user_name', '$password', '$phone', '$role', '$image')";

    executeQuery($sql);
    header("location: " . ADMIN_URL . 'account');
}

function user_edit_form()
{
    $id = $_GET['id'];
    $sql = "select * from user where user_id = $id";
    $user = executeQuery($sql,false);
    admin_render('account/edit-form.php', [
        'user' => $user
    ]);
}

function user_save_edit()
{
    $id = $_GET['id'];
    $sql = "select * from user where user_id=$id";
    $oldData = executeQuery($sql, false);

    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    $file = $_FILES['image'];
    $image = $oldData['image'];

    if ($file['size'] > 0) {
        $filename = $file['name'];
        move_uploaded_file($file['tmp_name'], './public/upload/avatars/' . $filename);
        $image = $filename;
    }

    $sql = "update user set name = '$name',
        user_name = '$user_name',
        phone = '$phone',
        role = '$role',
        image = '$image'
        where user_id = $id";

    executeQuery($sql);
    header("location:" . ADMIN_URL . 'account');
}

function user_remove()
{
    $id = $_GET['id'];
    $sql = "delete from user where user_id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'account');
}

function update_user() {
    if (isset($_POST['btn-update-user'])) {
        $user_id = $_POST['user_id'];
        $active = $_POST['active'];
        $sql = "update user set active='$active' where user_id=$user_id"; 
        pdo_execute($sql);
        header("location:". ADMIN_URL . 'account');
    }
}