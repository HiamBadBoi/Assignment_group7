<?php
function add_bill()
{
    // if (isset($_POST['btn-order'])) {
    $category_id = $_GET['category-id'];
    $amount = $_GET['amount'];
    $table_id = $_GET['table-id'];
    $user_id = $_SESSION['login']['user_id'];
    $status = 'Chưa thanh toán';
    $sql = "insert into bill (date,amount,status,desk_id,user_id) values
                    (now(),'$amount','$status','$table_id','$user_id')";
    $last_ID = pdo_execute_return_lastInsertId($sql);
    $sql = "update desk set status='đã đặt' where desk_id='$table_id'";
    pdo_execute($sql);
    foreach ($_SESSION['order'][$table_id] as $order) {
        extract($order);
        for ($i = 0; $i < $soluong; $i++) {
            $sql = "insert into detail_bill (bill_id,food_id) values
                    ('$last_ID','$food_id')";
            pdo_execute($sql);
        }
    }
    //luu lai bill_id cua table vao column bill_session cua desk
    // $_SESSION['bill-id'][$table_id] = $last_ID;
    $sql = "update desk set bill_session=$last_ID where desk_id=$table_id";
    pdo_execute($sql);
    $_SESSION['order'][$table_id] = [];
    //Update status desk
    $sql = "update desk set status='đã đặt' where desk_id=$table_id";
    pdo_execute($sql);
    header("location:" . STAFF_URL . "order?table-id=$table_id&bill-id=$last_ID&category-id=$category_id");
    // header("location:". STAFF_URL . "order/bill?table-id=$table_id&bill-id=$last_ID");
    // }
}
function add_bill_update()
{
    $category_id = $_GET['category-id']??1;
    $amount = $_GET['amount'];
    $table_id = $_GET['desk-id'];

    $sql = "select bill_session from desk where desk_id=$table_id";
    $bill_session = pdo_query_one($sql);
    $bill_id = isset($bill_session['bill_session']) ? $bill_session['bill_session'] : NULL;

    $sql = "update bill set amount=amount+$amount where bill_id=$bill_id";
    pdo_execute($sql);
    foreach ($_SESSION['order'][$table_id] as $order) {
        extract($order);
        for ($i = 0; $i < $soluong; $i++) {
            $sql = "insert into detail_bill (bill_id,food_id) values
                    ('$bill_id','$food_id')";
            pdo_execute($sql);
        }
    }
    $_SESSION['order'][$table_id] = [];
    //Update status desk
    header("location:" . STAFF_URL . "order?table-id=$table_id&bill-id=$bill_id&category-id=$category_id");
    // header("location:". STAFF_URL . "order/bill?table-id=$table_id&bill-id=$last_ID");
    // }
}

function get_bill()
{   
    $bill_id = $_GET['bill-id'];
    $sql = "select user.name, bill.bill_id, bill.date, bill.desk_id,bill.amount
                from user 
                INNER JOIN bill ON bill.user_id = user.user_id
                where bill_id=$bill_id";
    $info_bill = pdo_query_one($sql);
    $sql = "select food.food_name, food.price, count(detail_bill.food_id) as 'soluong' from detail_bill
        INNER JOIN food ON food.food_id=detail_bill.food_id where bill_id=$bill_id group by detail_bill.food_id";
    $info_bills = pdo_query($sql);

    nhanvien_render('bill/bill.php', [
        'info_bill' => $info_bill,
        'info_bills' => $info_bills
        ],
        ['bill/bill.js']
    );
}
function done_bill()
{
    $bill_id = $_GET['bill-id'];
    $table_id = $_GET['desk-id'];
    //Update status của bill
    $sql = "update bill set status='Đã thanh toán' where bill_id=$bill_id";
    pdo_execute($sql);
    //Update status của desk
    $sql = "update desk set status='chưa dọn' where desk_id=$table_id";
    pdo_execute($sql);
    unset($_SESSION['order'][$table_id]);
    // unset($_SESSION['bill-id'][$table_id]);
    //update bill_session cua desk
    $sql = "update desk set bill_session=NULL where desk_id=$table_id";
    pdo_execute($sql);
    //  echo '<pre>';
    // var_dump($_SESSION['order'][$table_id]);
    header("location:" . BASE_URL . 'staff');
}
