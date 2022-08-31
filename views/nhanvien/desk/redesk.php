<div class="location d-flex gap-2">
    <?php
    foreach ($location as $l) : ?>
        <form action="<?=  STAFF_URL . 'redesk?location=' . $l['location'] . '&redesk-id='.$_GET['redesk-id'] ?>" method="post">
        <button type="submit" name="redesk" class="btn btn-primary">
            Tầng <?= $l['location'] ?>
        </button>
    </form>
    <?php endforeach ?>
</div>

<div class="list-desk container-fluid" >
    <?php
    foreach ($dsBan as $d) :
    ?>
        <?php
         if ($d['status'] == "đã đặt") {
            echo '<div class="box-desk-3 card text-center animate__animated animate__fadeIn animate__slower" style="width: 12rem;">';
            echo '<a href="javascript:;" 
                    class="btn-redesk-false">
                    Bàn số '. $d['desk_id'] .'
                 </a>';
        }
        if($d['status'] == "trống") {
            echo '<div class="box-desk card text-center animate__animated animate__fadeIn animate__slower" style="width: 12rem;">';
            echo '<a href="javascript:;" 
                    data-url="'.STAFF_URL.'redesk-save?table-id='.$d["desk_id"].'&redesk-id='.$redesk_id.'" 
                    data-name="'.$d["desk_id"].'"
                    class="btn-redesk">
                    Bàn số '. $d["desk_id"] .'
                 </a>';
            
        }
        if ($d['status'] == "chưa đặt") {
            echo '<div class="box-desk-2 card text-center" style="width: 12rem;">';
            echo '<a href="javascript:;" 
                    class="btn-redesk-false">
                    Bàn số '. $d['desk_id'] .'
                 </a>';
        }
        if ($d['status'] == "chưa dọn") {
            echo '<div class="box-desk-4 card text-center" style="width: 12rem;">';
            echo '<a href="javascript:;" 
                    class="btn-redesk-false">
                    Bàn số '. $d['desk_id'] .'
                 </a>';
        }
        ?>
        
</div>
<?php endforeach ?>
</div>
<button class="btn btn-primary quaylai"><a href="<?= BASE_URL . "staff/order/bill?table-id=".$_GET['redesk-id']."&bill-id=$bill_id" ?>">Quay lại..</a></button>