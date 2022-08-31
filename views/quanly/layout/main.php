<?php if(empty($_SESSION['login'])||$_SESSION['login']['role']!='admin')
{
    header ("Location:".BASE_URL);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Grandrestaurant | Dashboard</title>
  <?php include_once "./views/quanly/layout/style.php" ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center dark-mode">
    <img class="animation__shake" src="<?= IMAGE_URL ?>header/grandrestaurant_logo.png" alt="GrandRestaurantLogo" height="80" width="200">
  </div>

  <!-- Navbar -->
  
  </div>
  <!-- /.navbar -->
  <?php include_once "header.php" ?>
  <!-- Main Sidebar Container -->
  <?php include_once "./views/quanly/layout/sidebar-demo.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php include_once $VIEW_PAGE; ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-brown">
    <?php include_once "./views/profile/profile.php"?>
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include_once "./views/quanly/layout/script.php" ?>
<?php if(count($files) > 0):?>
  <?php foreach ($files as $files): ?>
    <script src="<?= PUBLIC_ASSETS ."customize/js/". $files?>" type="text/javascript"></script>
  <?php endforeach ?>
<?php endif?>

</body>
</html>