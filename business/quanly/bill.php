<?php
const status = [
    'Đã thanh toán' => "Đã thanh toán",
    'Chưa thanh toán' => "Chưa thanh toán"
];
function bill_index()
{
    $date = Date("Y-m-d");
    if (isset($_POST['btn-filter'])) {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $newdate = strtotime('+2 day', strtotime($endDate));
        $endDate = date('Y-m-j', $newdate);
        $status = $_POST['status'];
        if ($status == "") {
            $sql = "select *,bill.status  from user INNER JOIN bill ON user.user_id = bill.user_id JOIN desk on bill.desk_id=desk.desk_id where date between '$startDate' and '$endDate'";
            $list_bills = pdo_query($sql);
        } else {
            $sql = "select *,bill.status  from user INNER JOIN bill ON user.user_id = bill.user_id JOIN desk on bill.desk_id=desk.desk_id where bill.status='$status' and date between '$startDate' and '$endDate'";
            $list_bills = pdo_query($sql);
        }
    } else {
        $sql = "select *,bill.status from user INNER JOIN bill ON user.user_id = bill.user_id JOIN desk on bill.desk_id=desk.desk_id where date like '%$date%'";
        $list_bills = pdo_query($sql);
    }

    $sql = "select * from bill where date like '%$date%' and bill.status='Đã thanh toán'";
    $list_bills_day = pdo_query($sql);
    $totalMoneyByDay = 0;
    foreach ($list_bills_day as $b) {
        $totalMoneyByDay += $b['amount'];
    }

    $dateMonth = Date("Y-m");
    $sql = "select * from bill INNER JOIN user ON bill.user_id = user.user_id where date like '%$dateMonth%' and bill.status='Đã thanh toán'";
    $list_bills_month = pdo_query($sql);
    $totalMoneyByMonth = 0;
    foreach ($list_bills_month as $b) {
        $totalMoneyByMonth += $b['amount'];
    }
    admin_render(
        'bill/index.php',
        [
            'list_bills' => $list_bills,
            'totalMoneyByDay' => $totalMoneyByDay,
            'totalMoneyByMonth' => $totalMoneyByMonth
        ],
        [
            'bill/bill.js'
        ]
    );
}

function update_bill()
{
    if (isset($_POST['btn-update-bill'])) {
        $bill_id = $_POST['bill_id'];
        $status = $_POST['status'];
        $sql = "update bill set status='$status' where bill_id=$bill_id";
        pdo_execute($sql);
        header("location:" . ADMIN_URL . 'bill');
    }
}
function get_bill($bill_id)
{
    $sql = "select food.food_name, food.price, count(detail_bill.food_id) as 'soluong' from detail_bill
        INNER JOIN food ON food.food_id=detail_bill.food_id where bill_id=$bill_id group by detail_bill.food_id";
    $info_bills = pdo_query($sql);
    foreach ($info_bills as $cart) {
        $sl = 0;
        extract($cart);
        $sl += $soluong;
        $thanhtien = $soluong * $price;
        echo '<tr>
                <td>' . $food_name . '</td>
                <td>' . $soluong . '</td>
                <td>' . $price . '</td>
                <td>' . $thanhtien . '</td>
            </tr>';
    }
}
function excel_export()
{
    $sql = "select bill.bill_id,bill.date,bill.amount,desk.desk_name,user.name from user INNER JOIN bill ON user.user_id = bill.user_id JOIN desk on bill.desk_id=desk.desk_id";
    $list_bills = pdo_query($sql);

    //Khởi tạo đối tượng
    $excel = new PHPExcel();
    //Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);
    //Tạo tiêu đề cho trang. (có thể không cần)
    $excel->getActiveSheet()->setTitle('HoaDon');
    // text-center
    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
    );
    $excel->getDefaultStyle('A1')->applyFromArray($style);


    //Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);

    //Xét in đậm cho khoảng cột
    $excel->getActiveSheet()->getStyle('A1:E1')->getFont('Time New Roman')->setBold(true);
    //Tạo tiêu đề cho từng cột
    //Vị trí có dạng như sau:
    /**
     * |A1|B1|C1|..|n1|
     * |A2|B2|C2|..|n1|
     * |..|..|..|..|..|
     * |An|Bn|Cn|..|nn|
     */
    $excel->getActiveSheet()->setCellValue('A1', 'Mã HD');
    $excel->getActiveSheet()->setCellValue('B1', 'Ngày tạo');
    $excel->getActiveSheet()->setCellValue('C1', 'Tổng tiền');
    $excel->getActiveSheet()->setCellValue('D1', 'Bàn');
    $excel->getActiveSheet()->setCellValue('E1', 'Thu ngân');
    // thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
    // dòng bắt đầu = 2
    $numRow = 2;
    foreach ($list_bills as $row) {
        $excel->getActiveSheet()->setCellValue('A' . $numRow, $row['bill_id']);
        $excel->getActiveSheet()->setCellValue('B' . $numRow, $row['date']);
        $excel->getActiveSheet()->setCellValue('C' . $numRow, $row['amount']);
        $excel->getActiveSheet()->setCellValue('D' . $numRow, $row['desk_name']);
        $excel->getActiveSheet()->setCellValue('E' . $numRow, $row['name']);
        $numRow++;
    }
    // Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
    // ở đây mình lưu file dưới dạng excel2007
    // PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('data.xlsx');
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="data.xls"');
    PHPExcel_IOFactory::createWriter($excel, 'Excel5')->save('php://output');
}
