<?php
function loadall_desk()
{
    //     $sql = "select * from desk group by location";
    //     $location = pdo_query($sql);
    //     $sql= "select * from desk where 1 order by desk_id asc";
    //     $listdesk = pdo_query($sql);
    //     staff_render('desk/desk_ui.php',
    //     [
    //         'location' => $location,
    //         'dsBan' => $listdesk,
    //     ]
    //     );
    header("location:" . STAFF_URL . "desk?location=1");
}
function load_location()
{
    $sql = "select * from desk group by location";
    $location = pdo_query($sql);
    $location_desk = $_GET['location'];
    $sql = "select * from desk where location =$location_desk";
    $location_desk = pdo_query($sql);
    $sql = "select * from category where active=1";
    $category = pdo_query($sql);
    nhanvien_render(
        'desk/desk_ui.php',
        [
            'location' => $location,
            'dsBan' => $location_desk,
            'category' => $category
        ]
    );
}
function load_relocation()
{
    $redesk_id = $_GET['redesk-id'];
    $sql = "select * from desk group by location";
    $location = pdo_query($sql);
    $location_desk = $_GET['location'];
    $sql = "select * from desk where location =$location_desk and active=1";
    $location_desk = pdo_query($sql);
    $sql = "select * from category where active=1";
    $category = pdo_query($sql);

    // Lay bill_id tu ban cu
    $sql = "select bill_session from desk where desk_id=$redesk_id";
    $bill_session = pdo_query_one($sql);
    $bill_id = $bill_session['bill_session'] ?? NULL;

    if (isset($_POST['redesk'])) {
        staff_render(
            'desk/redesk.php',
            [
                'redesk_id' => $redesk_id,
                'location' => $location,
                'dsBan' => $location_desk,
                'category' => $category,
                'bill_id' => $bill_id
            ],
            [
                'bill/bill.js'
            ]
        );
    }
    if (isset($_POST['combine'])) {
        staff_render(
            'desk/combine.php',
            [
                'redesk_id' => $redesk_id,
                'location' => $location,
                'dsBan' => $location_desk,
                'category' => $category,
                'bill_id' => $bill_id
            ],
            [
                'bill/bill.js'
            ]
        );
    }
}
function save_relocation()
{
    $desk_id = $_GET['table-id'];
    $redesk_id = $_GET['redesk-id'];
    // lấy bill_id bàn cũ đẩy qua bàn mới và set lại số bàn mới cho bill
    $sql = "select bill_session from desk where desk_id=$redesk_id";
    $bill_session = pdo_query_one($sql);
    $sql = "update desk set bill_session=" . $bill_session['bill_session'] . " where desk_id=$desk_id";
    echo $sql;
    pdo_execute($sql);
    $sql = "update bill set desk_id=$desk_id where bill_id=" . $bill_session['bill_session'];
    pdo_execute($sql);


    // unset($_SESSION['bill-id'][$redesk_id]);
    //thay đổi trạng thái 2 bản cũ mới sau khi chuyển bàn - và set Null bill_session cho bàn cũ
    $sql = "update desk set bill_session=NULL where desk_id=$redesk_id";
    pdo_execute($sql);
    $sql = "update desk set status='trống' where desk_id=$redesk_id";
    pdo_execute($sql);
    $sql = "update desk set status='đã đặt' where desk_id=$desk_id";
    pdo_execute($sql);

    $sql = "select bill_session from desk where desk_id=$desk_id";
    $bill_session = pdo_query_one($sql);
    $bill_id = isset($bill_session['bill_session']) ? '&bill-id=' . $bill_session['bill_session'] : NULL;
    // $bill_id = isset($_SESSION['bill-id'][$desk_id])? '&bill-id='.$_SESSION['bill-id'][$desk_id]: NULL;
    header("location:" . STAFF_URL . 'order?table-id=' . $desk_id . $bill_id);
}
function save_combine()
{
    $desk_id = $_GET['table-id'];
    $redesk_id = $_GET['redesk-id'];
    // lấy bill_id bàn cũ 
    $sql = "select bill_session from desk where desk_id=$redesk_id";
    $bill_session = pdo_query_one($sql);
    //laay so tien tu bill cua ban cu
    $sql = "select amount from bill where bill_id=" . $bill_session['bill_session'];
    $amount_redesk = pdo_query_one($sql);

    //lay bill_id cua ban moi
    $sql = "select bill_session from desk where desk_id=$desk_id";
    $bill_session_desk = pdo_query_one($sql);

    //update so tien vao bill cua ban moi
    $sql = "update bill set amount=amount+" . $amount_redesk['amount'];
    $sql .= " where bill_id=" . $bill_session_desk['bill_session'];
    pdo_execute($sql);

    //set so tien bill cu ve 0
    $sql = "update bill set amount=0 where bill_id=" . $bill_session['bill_session'];
    pdo_execute($sql);
    //set trạng thai ban cu sang Đã ghép đơn
    $sql = "update bill set status='Đã ghép đơn' where bill_id=" . $bill_session['bill_session'];
    pdo_execute($sql);


    // set detail_bill cua bill cu thanh bill_id moi
    $sql = "update detail_bill set bill_id=" . $bill_session_desk['bill_session'];
    $sql .= " where detail_bill.bill_id=" . $bill_session['bill_session'];
    pdo_execute($sql);

    // unset($_SESSION['bill-id'][$redesk_id]);
    //thay đổi trạng thái 2 bản cũ mới sau khi chuyển bàn - và set Null bill_session cho bàn cũ
    $sql = "update desk set bill_session=NULL where desk_id=$redesk_id";
    pdo_execute($sql);
    $sql = "update desk set status='trống' where desk_id=$redesk_id";
    pdo_execute($sql);
    $sql = "update desk set status='đã đặt' where desk_id=$desk_id";
    pdo_execute($sql);

    $sql = "select bill_session from desk where desk_id=$desk_id";
    $bill_session = pdo_query_one($sql);
    $bill_id = isset($bill_session['bill_session']) ? '&bill-id=' . $bill_session['bill_session'] : NULL;
    // $bill_id = isset($_SESSION['bill-id'][$desk_id])? '&bill-id='.$_SESSION['bill-id'][$desk_id]: NULL;
    header("location:" . STAFF_URL . 'order?table-id=' . $desk_id . $bill_id);
}
