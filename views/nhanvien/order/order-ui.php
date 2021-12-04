<section class="menu-order">
    <div class="list-food">
        <?php foreach ($list_foods as $x) : ?>
            <div class="list-food-item">
                <div class="food-image">
                    <img src="<?= IMAGE_URL . 'food/' . $x['image'] ?>" alt="">
                </div>
                <label class="name"><?= $x['food_name'] ?></label>
                <br>
                <label class="price"><?= $x['price'] ?> VND</label>
                <form action="<?= STAFF_URL . 'order/addtocart' ?>" method="post">
                    <input type="hidden" name="food_id" value="<?= $x['food_id'] ?>">
                    <input type="hidden" name="table_id" value="<?= $_GET['table-id'] ?>">
                    <input type="hidden" name="bill_id" value="<?php isset($_GET['bill-id'] )? $_GET['bill-id']  : ""?>">
                    <input type="hidden" name="food_name" value="<?= $x['food_name'] ?>">
                    <input type="hidden" name="price" value="<?= $x['price'] ?>">
                    <input type="hidden" name="image" value="<?= $x['image'] ?>">
                    <input type="hidden" name="category-id" value="<?=$_GET['category-id']??1 ?>">
                    <button type="submit" name="btn-addtocart">Thêm</button>
                </form>
            </div>
        <?php endforeach ?>
    </div>
    <div class="list_categorys">
        <div class="title">
            <h1>Danh mục</h1>
        </div>
        <ul>    
            <?php
                $bill_id = isset($_SESSION['bill-id'][$_GET['table-id']])? '&bill-id='.$_SESSION['bill-id'][$_GET['table-id']]: NULL;
            ?>
            <?php foreach ($category as $cate) : ?>
                <a href="<?= STAFF_URL."order?table-id=".$table_id."&category-id=".$cate['category_id'].$bill_id?>">
                    <li><?= $cate['category_name'] ?></li>
                </a>
            <?php endforeach ?>
        </ul>
    </div>
    <?php if(isset($list_fooded)) { ?>
    <div class="order-bill">
        <div class="">
            <h3>Tầng 1 - Bàn số: <?=$table_id = $_GET['table-id']?>  - Các món đã đặt</h3>
            <table>
                <thead>
                    <th>Hình ảnh </th>
                    <th>Tên món</th>
                    <!-- <th>SL</th> -->
                    <th>Đơn giá</th>
                </thead>
                <tbody>
                    <?php
                        $tongtien = 0;  
                        $sl = 0;
                            foreach($list_fooded as $cart) {
                                extract($cart);
                                // $thanhtien = $quantity * $price;
                                // $tongtien += $thanhtien;
                                echo '<tr>
                                        <td><img src="'.IMAGE_URL.'food/'.$image.'" alt="" width="100px"></td>
                                        <td>'.$food_name.'</td>
                                        <td>'.$price.'</td>
                                    </tr>';
                            }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td>Số lượng: <?= $sl?></td>
                        <td colspan='1'>Tạm tính: <?= $tongtien = $tongtien + $tongtien/10?></td>
                        <td colspan="1">
                            <a href="<?= STAFF_URL. "order/bill?table-id=$table_id&bill-id=$bill_id"?>"><button>Thanh toán</button></a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php }?>
    <div class="order-bill">
        <div class="">
            <h3>Tầng 1 - Bàn số: <?=$table_id = $_GET['table-id']?></h3>
            <table>
                <thead>
                    <th>Hình ảnh </th>
                    <th>Tên món</th>
                    <th>SL</th>
                    <th>Đơn giá</th>
                    <th>Ghi chú</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        $table_id = $_GET['table-id'];
                        $tongtien = 0;
                        $sl = 0;
                        if(isset($_SESSION["order"][$table_id])) {
                            foreach ($_SESSION["order"][$table_id] as $cart) {
                                extract($cart);
                                $sl += $soluong;
                                $thanhtien = $soluong * $price;
                                $tongtien += $thanhtien;
                                echo '<tr>
                                        <td><img src="'.IMAGE_URL.'food/'.$image.'" alt="" width="100px"></td>
                                        <td>'.$food_name.'</td>
                                        <td>'.$soluong.'</td>
                                        <td>'.$price.'</td>
                                        <td></td>
                                        <td><a href="' . STAFF_URL . 'order/delete?id=' . $food_id . '&table-id=' . $table_id .'&category-id='.$category_id.$bill_id.'" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>';
                            }
                        }
                    
                    // session_unset();
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td>Số lượng: <?= $sl?></td>
                        <td colspan='2'>Tạm tính: <?= $tongtien = $tongtien + $tongtien/10?></td>
                        <?php 
                            if (isset($table_status['status']) && $table_status['status'] == 'đã đặt') {
                                $bill_id = isset($_GET['bill-id']) ? $_GET['bill-id'] : "";
                                echo '
                                    <td>
                                        <a href="'.STAFF_URL.'order/delete?table-id='.$table_id.'"><button>Hủy</button></a>
                                    </td>
                                    <td colspan="2">
                                        <a href="'.STAFF_URL.'order/add-bill-update?desk-id='.$table_id.'&amount='.$tongtien.'"><button>Đặt Thêm</button></a>
                                    </td>
                                ';
                            }else if ($table_status['status'] == 'chưa dọn'){
                                echo '
                                    <td colspan="3">
                                    <a href="'.STAFF_URL.'order/delete?table-id='.$table_id.'"><button>Dọn xong</button></a>
                                    </td>
                                ';
                            }else{
                                echo '
                                    <td>
                                        <a href="'.STAFF_URL.'order/delete?table-id='.$table_id.'"><button>Hủy</button></a>
                                    </td>
                                    <td colspan="2">
                                        <a href="'.STAFF_URL.'order/add-bill?desk-id='.$table_id.'&amount='.$tongtien.'"><button>Đặt Bàn</button></a>
                                    </td>
                                ';
                            }
                        ?>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <a href="<?= BASE_URL . "staff" ?>">Quay lại..</a>
</section>