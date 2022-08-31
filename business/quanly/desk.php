<?php
const active = [
    '0' => "Đã hỏng",
    '1' => "Đang sử dụng"
];
function desk_index()
{
    $sql = "select * from desk";
    $desks = pdo_query($sql);

    admin_render(
        'desk/index.php',
        [
            'desks' => $desks,
        ],
        [
            'desk/list.js'
        ]
    );
}
function desk_add_form(){

    admin_render('desk/add-form.php');
}
function desk_submit_add(){
    // nhận dữ liệu từ form gửi lên
    $desk_name = $_POST['desk_name'];
    $capacity = $_POST['capacity'];
    $location = $_POST['location'];

    
    $sql = "insert into desk 
                (desk_name, capacity, location,status) 
            values 
                ('$desk_name', '$capacity', '$location','trống')";
    // Thực thi câu sql với db
    pdo_execute($sql);
    header("location: " . ADMIN_URL . 'desk');
}
function desk_edit_form()
{
    $desk_id = $_GET['desk_id'];
    $sql = "select * from desk where desk_id = $desk_id";
    $desks = pdo_query_one($sql);
    admin_render('desk/edit-form.php', [
        'desks' => $desks
    ]);
}
function desk_remove()
{
    $desk_id = $_GET['desk_id'];
    $sql = "delete from desk where desk_id = $desk_id";
    pdo_execute($sql);
    header("location: " . ADMIN_URL . 'desk');
}
function desk_save_edit()
{
    $desk_id = $_GET['desk_id'];
    $desk_name = $_POST['desk_name'];
    $capacity = $_POST['capacity'];
    $location = $_POST['location'];
    $sql = "update desk set desk_name = '$desk_name', capacity = '$capacity', location = '$location' where desk_id = $desk_id ";
    pdo_execute($sql);
    header("location:" . ADMIN_URL . 'desk');
}
function update_desk() {
    if (isset($_POST['btn-update-desk'])) {
        $desk_id = $_POST['desk_id'];
        $active = $_POST['active'];
        $sql = "update desk set active='$active' where desk_id=$desk_id"; 
        pdo_execute($sql);
        header("location:". ADMIN_URL . 'desk');
    }
}
?>