<?php
    function add_bill() {
        // if (isset($_POST['btn-order'])) {
            
            $amount = $_GET['amount'];
            $desk_id = $_GET['desk-id'];
            $user_id = 1;
            $status = 'Chưa thanh toán';
            $sql = "insert into bill (date,amount,status,desk_id,user_id) values
                    (now(),'$amount','$status','$desk_id','$user_id')";
            $last_ID = pdo_execute_return_lastInsertId($sql);
            $sql="update desk set status='đã đặt' where desk_id='$desk_id'";
            pdo_execute($sql);
            foreach($_SESSION['order'][$desk_id] as $order) {
                extract($order);
                $sql = "insert into detail_bill (quantity,bill_id,food_id) values
                ('$soluong','$last_ID','$food_id')";
                pdo_execute($sql);
            }
            header("location:". STAFF_URL . "order/bill?table-id=$desk_id&bill-id=$last_ID");
        // }

    }
    function get_bill() {

        nhanvien_render('bill/bill.php');
        // header("location:". STAFF_URL . "order/bill?table-id=$desk_id");
    }
    function done_bill() {
        $bill_id = $_GET['bill-id'];
        $desk_id = $_GET['desk-id'];
        $sql = "update bill set status='Đã thanh toán' where bill_id=$bill_id";
        pdo_execute($sql);
        $_SESSION['order'][$desk_id] = [];
        header("location:". BASE_URL . 'staff');
    }
?>