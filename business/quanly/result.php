<?php
function week()
{
    //1 ngày
    $date = Date("Y-m-d");
    $sql = "select * from bill where date like '%$date%' and bill.status='Đã thanh toán'";
    $list_bills_day = pdo_query($sql);
    $totalMoneyByDay = 0;
    foreach ($list_bills_day as $b) {
        $totalMoneyByDay += $b['amount'];
    }
    //1 tháng
    $dateMonth = Date("Y-m");
    $sql = "select * from bill INNER JOIN user ON bill.user_id = user.user_id where date like '%$dateMonth%' and bill.status='Đã thanh toán'";
    $list_bills_month = pdo_query($sql);
    $totalMoneyByMonth = 0;
    foreach ($list_bills_month as $b) {
        $totalMoneyByMonth += $b['amount'];
    }
    // danh sách 7 ngày

    $listDays = [];
    for ($i = 0; $i <= 7; $i -= -1) {
        $date = new DateTime('-' . $i . 'days');
        $dateFormat = $date->format('Y-m-d');
        $listDays[] = $dateFormat;
    }
    $listDays = array_reverse($listDays);

    // lấy tất cả hóa đơn trong từng ngày
    // chạy vòng lặp các hóa đơn, cộng tổng tiền từng ngày
    // add vào mảng
    $listMoney = [];
    foreach ($listDays as $day) {
        $getBillByDateQuery = "select*from bill where  date between '$day 0:0:0' and '$day 23:59:59' and bill.status='Đã thanh toán'";
        $bill = pdo_query($getBillByDateQuery);
        $totalMoneyByWeek = 0;
        foreach ($bill as $b) {
            $totalMoneyByWeek += $b['amount'];
        }
        $listMoney[] = $totalMoneyByWeek;
    }
    admin_render('result/index.php', compact('listDays', 'listMoney', 'totalMoneyByDay', 'totalMoneyByMonth'), ['result/result.js', 'result/datepicker.js']);
}
function month()
{
    //1 ngày
    $date = Date("Y-m-d");
    $sql = "select * from bill where date like '%$date%' and bill.status='Đã thanh toán'";
    $list_bills_day = pdo_query($sql);
    $totalMoneyByDay = 0;
    foreach ($list_bills_day as $b) {
        $totalMoneyByDay += $b['amount'];
    }
    // danh sách 1 tháng
    $thisMonth = date('d');
    $listDays = [];
    for ($i = 0; $i <= $thisMonth; $i -= -1) {
        $date = new DateTime('-' . $i . 'days');
        $dateFormat = $date->format('Y-m-d');
        $listDays[] = $dateFormat;
    }
    $listDays = array_reverse($listDays);

    // lấy tất cả hóa đơn trong từng ngày
    // chạy vòng lặp các hóa đơn, cộng tổng tiền từng ngày
    // add vào mảng
    $listMoney = [];
    foreach ($listDays as $day) {
        $getBillByDateQuery = "select*from bill where  date between '$day 0:0:0' and '$day 23:59:59' and bill.status='Đã thanh toán'";
        $bill = pdo_query($getBillByDateQuery);
        $totalMoneyByMonth = 0;
        foreach ($bill as $b) {
            $totalMoneyByMonth += $b['amount'];
        }
        $listMoney[] = $totalMoneyByMonth;
    }
    admin_render('result/index.php', compact('listDays', 'listMoney', 'totalMoneyByDay', 'totalMoneyByMonth'), ['result/result.js']);
}

function hour()
{   
    //1 ngày
    $date = Date("Y-m-d");
    $sql = "select * from bill where date like '%$date%' and bill.status='Đã thanh toán'";
    $list_bills_day = pdo_query($sql);
    $totalMoneyByDay = 0;
    foreach ($list_bills_day as $b) {
        $totalMoneyByDay += $b['amount'];
    }
    //1 tháng
    $dateMonth = Date("Y-m");
    $sql = "select * from bill INNER JOIN user ON bill.user_id = user.user_id where date like '%$dateMonth%' and bill.status='Đã thanh toán'";
    $list_bills_month = pdo_query($sql);
    $totalMoneyByMonth = 0;
    foreach ($list_bills_month as $b) {
        $totalMoneyByMonth += $b['amount'];
    }
    // 1 ngày
    $thisday = Date('H');
    $listDays = [];
    for ($i = 0; $i <= $thisday; $i++) {
        $date = new DateTime('-' . $i . 'Hours');
        $dateFormat = $date->format('H:00:00');
        $listDays[] = $dateFormat;
    }
    $listDays = array_reverse($listDays);


    // lấy tất cả hóa đơn trong từng ngày
    // chạy vòng lặp các hóa đơn, cộng tổng tiền từng ngày
    // add vào mảng
    $listMoney = [];
    foreach ($listDays as $day) {
        $getBillByDateQuery = "select*from bill where TIME(date) between '$day' and addtime('$day','01:00:00') and bill.status='Đã thanh toán'";
        $bill = pdo_query($getBillByDateQuery);
        $totalMoneyByHour = 0;
        foreach ($bill as $b) {
            $totalMoneyByHour += $b['amount'];
        }
        $listMoney[] = $totalMoneyByHour;
    }
    admin_render('result/index.php', compact('listDays', 'listMoney', 'totalMoneyByDay', 'totalMoneyByMonth'), ['result/result.js', 'result/datepicker.js']);
}
