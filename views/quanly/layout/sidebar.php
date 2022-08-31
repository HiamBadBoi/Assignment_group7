<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=BASE_URL?>admin" class="brand-link">
    <img src="<?= IMAGE_URL ?>header/grandrestaurant_logo.png" alt="Grand Logo" class="img-fluid elevation-3" style="opacity: 8">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= ADMIN_ASSETS ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- RESULT -->
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'result' ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Statistics
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <!-- BILL -->
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'bill' ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Bill</p>
          </a>
        </li>
        <!-- ACCOUNT -->
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'account' ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Account</p>
          </a>
        </li>
        <!-- CATEGORY -->
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'category' ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Categories</p>
          </a>
        </li>
        <!-- FOOD -->
        </li>
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'food' ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Food
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'desk' ?>" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Desk
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>