<?php
function list_undone(){
    $sql = "select food_name, food.food_id, TIME(time) as hour, detail_id, detail_bill.status, detail_bill.bill_id, bill.desk_id, desk_name, location ";
    $sql .=" from food join detail_bill on food.food_id = detail_bill.food_id ";
    $sql .=" join bill on detail_bill.bill_id = bill.bill_id "; 
    $sql .=" join desk on bill.desk_id = desk.desk_id ";
    $sql .=" where detail_bill.status = 'chưa hoàn thành' order by time asc  ";
    $list_bill = pdo_query($sql);
    chef_render('undone/undone.php',
     [
        'list_bill' => $list_bill,
    ]
);
}
function done_detail_bill(){
    $detail_id = $_GET['detail_id'];
    $sql = "update detail_bill
    set status = 'hoàn thành' ,process=1 
    where detail_id = $detail_id";
    pdo_execute($sql);
    header("location:". BASE_URL."chef" );
}
?>