<div class="location">
    <?php
    foreach ($location as $l) : ?>
        <button class="btn btn-primary"><a href="<?= STAFF_URL . 'desk?location=' . $l['location'] ?>">Tầng <?= $l['location'] ?></a></button>
    <?php endforeach ?>
</div>

<div class="list-desk container-fluid">
    <?php
    foreach ($dsBan as $d) :?>
        <?php
        $sql = "select bill_session from desk where desk_id=".$d['desk_id'];
        $bill_session = pdo_query_one($sql);
        $bill_id = isset($bill_session['bill_session']) ? '&bill-id=' . $bill_session['bill_session'] : NULL;   
        if ($d['status'] == "đã đặt") {
            echo '<div class="box-desk-3 card text-center animate__animated animate__fadeIn animate__slower" style="width: 12rem;">';
        }
        if ($d['status'] == "trống") {
            echo '<div class="box-desk card text-center animate__fadeIn animate__slower" style="width: 12rem;">';
        }
        if ($d['status'] == "chưa đặt") {
            echo '<div class="box-desk-2 card text-center animate__animated animate__fadeIn animate__slower" style="width: 12rem;">';
        }
        if ($d['status'] == "chưa dọn") {
            echo '<div class="box-desk-4 card text-center animate__animated animate__fadeIn animate__slower" style="width: 12rem;">';
        }
        ?>
        <a href="<?= STAFF_URL . 'order?table-id=' . $d['desk_id'] . $bill_id ?>">Bàn số <?= $d['desk_name'] ?></a> &nbsp;
</div>
<?php endforeach ?>

</div>