<div class="row">
    <div class="col-md-3 col-sm-6 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Doanh thu ngày</span>
                <span class="info-box-number"><?= $totalMoneyByDay ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Doanh thu tháng</span>
                <span class="info-box-number"><?= $totalMoneyByMonth ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>
<!-- Biểu đồ -->
<div class="col-12 mt-12">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>
<script>
    var listTitle = <?= json_encode($listDays) ?>;
    var listData = <?= json_encode($listMoney) ?>;
</script>