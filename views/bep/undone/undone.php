<div class="table_undone table-responsive-md">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên Món</th>
        <th scope="col">Giờ đặt</th>
        <th scope="col">Bàn</th>
        <th scope="col">Tầng</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($list_bill as $b => $value) : ?>
        <tr>
          <th scope="row"><?= $b + 1 ?></th>
          <td><?= $value['food_name'] ?></td>
          <td><?= $value['hour'] ?></td>
          <td><?= $value['desk_name'] ?></td>
          <td><?= $value['location'] ?></td>
          <td class="done"><a class="" href="<?= CHEF_URL . 'food/done?detail_id=' . $value['detail_id'] ?>"><button type="button" class="btn btn-success">Hoàn thành</button></a></td>
        </tr>
      <?php endforeach ?>
  </table>
</div>