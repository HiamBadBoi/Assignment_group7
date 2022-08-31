<?php
const active = [
    '0' => "Hết món",
    '1' => "Còn món"
];
function list_food()
{
    $sql = "select * from food";
    $food = pdo_query($sql);

    admin_render(
        'food/index.php',
        [
            'food' => $food,
        ],
        [
            'food/food.js'
        ]
    );
}
// Hàm trả về category_name dựa vào id
function category_food($id)
{
    $sql = "select category_name from category where category_id=$id";
    $category_name = pdo_query_value($sql);
    return $category_name;
}
// ======================================================
function add_form()
{
    admin_render('food/add-form.php');
}

function food_submit_add()
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $file = $_FILES['image'];
    $image = "";

    if ($file['size'] > 0) {
        $filename = $file['name'];
        move_uploaded_file($file['tmp_name'], './public/upload/food/' . $filename);
        $image = $filename;
    }

    $sql = "insert into food 
    (food_name,price,category_id,image) values 
    ('$name', '$price', '$category_id', '$image')";

    executeQuery($sql);
    header("location: " . ADMIN_URL . 'food');
}

function food_edit_form()
{
    $id = $_GET['id'];
    $sql = "select * from food where food_id = $id";
    $food = executeQuery($sql, false);
    admin_render('food/edit-form.php', [
        'food' => $food
    ]);
}

function food_save_edit()
{
    $id = $_GET['id'];
    $sql = "select * from food where food_id=$id";
    $oldData = executeQuery($sql, false);

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $file = $_FILES['image'];
    $image = $oldData['image'];

    if ($file['size'] > 0) {
        $filename = $file['name'];
        move_uploaded_file($file['tmp_name'], './public/upload/food/' . $filename);
        $image = $filename;
    }

    $sql = "update food set food_name = '$name',
        price = '$price',
        category_id = '$category_id',
        image = '$image'
        where food_id = $id";

    executeQuery($sql);
    header("location:" . ADMIN_URL . 'food');
}

function food_remove()
{
    $id = $_GET['id'];
    $sql = "delete from `detail_bill` where `food_id`='$id';
            DELETE FROM `food` WHERE `food_id` ='$id'";
    pdo_execute($sql);
    header("location: " . ADMIN_URL . 'food');
}

function update_food() {
    if (isset($_POST['btn-update-food'])) {
        $food_id = $_POST['food_id'];
        $active = $_POST['active'];
        $sql = "update food set active='$active' where food_id=$food_id"; 
        pdo_execute($sql);
        header("location:". ADMIN_URL . 'food');
    }
}