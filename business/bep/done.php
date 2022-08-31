<?php 
function list_done(){
    $sql = "select food_name, food.food_id, TIME(time) as hour, detail_id, detail_bill.status, detail_bill.bill_id, bill.desk_id, desk_name, location ";
    $sql .=" from food join detail_bill on food.food_id = detail_bill.food_id ";
    $sql .=" join bill on detail_bill.bill_id = bill.bill_id "; 
    $sql .=" join desk on bill.desk_id = desk.desk_id ";
    $sql .=" where detail_bill.status = 'hoàn thành' order by time desc ";
    $list_bill = pdo_query($sql);
    chef_render('done/done.php',
     [
        'list_bill' => $list_bill,
    ]
);
}
function undone_detail_bill(){
    $detail_id = $_GET['detail_id'];
    $sql = "update detail_bill
    set status = 'chưa hoàn thành'  , process=NULL
    where detail_id = $detail_id";
    pdo_execute($sql);
    header("location:". CHEF_URL."done" );
}
?>