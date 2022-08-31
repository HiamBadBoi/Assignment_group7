<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="form-group input-daterange">
            <label>Date range:</label>
            <div class="input-group d-inline align-items-center">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                    </span>
                    <form action="<?= ADMIN_URL . 'bill'?>" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-ml" id="daterange" name="daterange" value="">
                            <input type="text" id="startDate" name="startDate" value="<?= date("Y-m-d")?>" hidden>
                            <input type="text" id="endDate" name="endDate" value="<?= date("Y-m-d")?>" hidden>
                        </div>
                </div>
            </div>
            <!-- /.input group -->
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <label>Trạng thái:</label>
            <div class="input-group">
                <select name="status" class="form-control">
                    <option value="" selected>Tất cả</option>
                    <?php
                        foreach(status as $key => $value) {
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    ?>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-ml btn-defaul" name="btn-filter">
                        <i class="fa fa-search " style="border: none; background-color: transparent;"></i>
                    </button>
                </div>
            </div>
        </form>
    <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Doanh thu ngày</span>
                <span class="info-box-number"><?= $totalMoneyByDay?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Doanh thu tháng</span>
        <span class="info-box-number"><?= $totalMoneyByMonth?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<h2>Danh sách Hóa đơn</h2>
<div class="table-responsive-md">
    <table class="table table-stripped">
        <thead>
            <th scope="col">Mã HĐ</th>
            <th scope="col">Ngày tạo đơn</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Số bàn</th>
            <th scope="col">Thu ngân</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Chi tiết</th>
            <!-- <th>
                <a href="<?= ADMIN_URL . 'account/add-form' ?>" class="btn btn-sm btn-success">Tạo mới</a>
            </th> -->
        </thead>
        <tbody>
            <?php foreach ($list_bills as $u) : ?>
                <tr>
                    <th scope="row"><?= $u['bill_id'] ?></th>
                    <td><?= $u['date'] ?></td>
                    <td><?= $u['amount'] ?></td>
                    <td><?= $u['desk_id'].'(Tầng'.$u['location'].')'?></td>
                    <td><?= $u['name'] ?></td>
                    <!-- <td><?= $u['status'] ?></td> -->
                    <td>
                        <form action="<?= ADMIN_URL . 'bill/update-bill'?>" method="post" class="d-flex">
                            <select name="status" class="form-control mr-3">
                                <?php
                                    foreach(status as $key => $value) {
                                        if($key == $u['status']){
                                            echo '<option value="'.$key.'" selected>'.$value.'</option>';
                                        }else{
                                            echo '<option value="'.$key.'">'.$value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="bill_id" value="<?= $u['bill_id']?>">
                            <button type="submit" name="btn-update-bill" class="btn btn-primary">Save</button>
                        </form>

                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" onclick="open_modal()" class="btn btn-success" data-toggle="modal" data-target=".modal-details<?= $u['bill_id']?>">
                        Xem
                        </button>

                        <!-- Modal -->
                        <div class="modal fade modal-details<?= $u['bill_id']?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết hóa đơn</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="border border-danger p-3">
                                        <div class="text-center">
                                            <h1>GRAND Restaurant</h1>
                                            <p>Đ/C: Số 147 Phùng Hưng,Đồng Xuân,Hoàn Kiếm,Hà Nội</p>
                                            <hr>
                                            <h2 class="text-danger">Phiếu thanh toán</h2>
                                        </div>
                                    <div class="row pt-2">
                                        <div class="col-6">
                                            <h6>Thu ngân: <?=$u['name']?></h6>
                                        </div>
                                        <div class="col-6 text-right">
                                            <h6>Mã hóa đơn:  <?= $u['bill_id']?></h6>
                                            <h6>Ngày: <?=$u['date']?></h6>
                                        </div>
                                    </div>
                                    <div class="detail-bill">
                                        <h5>Tầng 1 - Bàn số: <?=$u['desk_id']?></h5>
                                        <table>
                                            <thead>
                                                <th>Tên món</th>
                                                <th>SL</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                   get_bill($u['bill_id']);
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan='4'>Tổng tiền: <?= $u['amount']?></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- ends modal -->
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="excel-export"><a href="<?=ADMIN_URL.'bill/export'?>"><button class="btn btn-success">Xuất hóa đơn</button></a></div>
</div>