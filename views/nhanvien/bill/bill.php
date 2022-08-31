<a href="<?=BASE_URL."staff"?>">Quay lại trang chủ</a>
<div class="col-4 offset-4 border border-danger p-3 mb-4">
    <div class="text-center">
        <h1>GRAND Restaurant</h1>
        <p>Đ/C: Số 147 Phùng Hưng,Đồng Xuân,Hoàn Kiếm,Hà Nội</p>
        <hr>
        <h2 class="text-danger">Phiếu thanh toán</h2>
    </div>
    <div class="row pt-2">
        <div class="col-6">
            <h6>Thu ngân: <?=$info_bill['name']?></h6>
        </div>
        <div class="col-6 text-right">
            <h6>Mã hóa đơn:  <?=$info_bill['bill_id']?></h6>
            <h6>Ngày: <?=$info_bill['date']?></h6>
        </div>
    </div>
    <div class="detail-bill">
        <h5>Tầng 1 - Bàn số: <?=$info_bill['desk_id']?></h5>
        <table>
            <thead>
                <th>Tên món</th>
                <th>SL</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </thead>
            <tbody>
                <?php
                    $table_id = $_GET['table-id'];
                    $tongtien = 0;
                    $sl = 0;
                    if(isset($info_bills)) {
                        foreach ($info_bills as $cart) {
                            extract($cart);
                            $sl += $soluong;
                            $thanhtien = $soluong * $price;
                            echo '<tr>
                                    <td>'.$food_name.'</td>
                                    <td>'.$soluong.'</td>
                                    <td>'.$price.'</td>
                                    <td>'.$thanhtien.'</td>
                                </tr>';
                        }
                    }
                    // session_unset();
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td>Số lượng: <?= $sl?></td>
                    <td colspan='2'>Tổng tiền: <?= $info_bill['amount']?></td>
                    <!-- <td>
                        <a href="<?=STAFF_URL.'order/delete?table-id='.$table_id?>"><button>Hủy</button></a>
                    </td> -->
                    <td colspan='2'>
                    <button  class="btn-danger">
                        <a href="javascript:;" 
                            data-url="<?=STAFF_URL."order/done-bill?&bill-id=".$_GET['bill-id']."&desk-id=$table_id"?>" 
                            class="to_pay">
                            Thanh toán
                        </a>
                    </button>
                    </td>
                </tr>
            </tfoot>
            
        </table>
        <hr>
        <div class="row p-2">
                Hóa đơn đã bao gồm 10% thuế giá trị gia tăng. Vui lòng kiểm tra hóa đơn trước khi thanh toán.
                <br>
                Chúc quý khách vủi vẻ, hẹn gặp lại!
            </div>
        </div>
</div>
<div class="d-flex justify-content-between">
    <button class="btn btn-primary quaylai"><a href="<?= BASE_URL . "staff/order?table-id=$table_id&bill-id=".$info_bill['bill_id'] ?>">Quay lại..</a></button>
    <form action="<?=STAFF_URL.'redesk?location=1&redesk-id='.$table_id?>" method="post">
        <button type="submit" name="redesk" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Chuyển bàn
        </button>
        <button type="submit" name="combine" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Ghép đơn
        </button>
    </form>
</div>
