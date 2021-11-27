<div class="location">
    <?php
    foreach ($location as $l) : ?>
        <button class="btn btn-primary"><a href="<?= STAFF_URL . 'nhanvien/desk?location=' . $l['location'] ?>">Tầng <?= $l['location'] ?></a></button>
    <?php endforeach ?>
</div>

<div class="list-desk " >
    <?php
    foreach ($dsBan as $d) :
    ?>
        <?php
         if ($d['status'] == "đã đặt") {
            echo '<div class="box-desk-3 card text-center" style="width: 18rem;">';
        }
        if($d['status'] == "trống") {
            echo '<div class="box-desk card text-center" style="width: 18rem;">';
        }
        if ($d['status'] == "chưa đặt") {
            echo '<div class="box-desk-2 card text-center" style="width: 18rem;">';
        }
        if ($d['status'] == "chưa dọn") {
            echo '<div class="box-desk-4 card text-center" style="width: 18rem;">';
        }
        ?>
        <a href="<?= STAFF_URL . 'nhanvien/order?id=' . $d['desk_id'] ?>">Bàn số <?= $d['desk_id'] ?></a> &nbsp;

</div>
<?php endforeach ?>
</div>
