<aside class="main-sidebar elevation-4">

    <nav class="mt-2 menu-bar">
        <a href="<?= BASE_URL ?>admin" class="brand-link">
            <img src="<?= IMAGE_URL ?>header/grandrestaurant_logo.png" alt="Grand Logo" class="img-fluid" style="opacity:1">
        </a>

        <ul class="nav nav-sidebar menu" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a class="" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- RESULT -->
            <li class="nav-item">
                <a href="<?= ADMIN_URL . 'result' ?>" class="nav-link active">
                    <i class="fas fa-chart-area"></i>
                    <p>
                        Statistic
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= ADMIN_URL . 'result-month' ?>" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Month</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= ADMIN_URL . 'result' ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Week</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= ADMIN_URL . 'result-hour' ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Hour</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- BILL -->
            <li class="nav-item">
                <a href="<?= ADMIN_URL . 'bill' ?>" class="nav-link">
                    <i class="fas fa-money-bill-wave-alt"></i>
                    <p>Bill</p>
                </a>
            </li>
            <!-- ACCOUNT -->
            <li class="nav-item toggle">
                <a href="<?= ADMIN_URL . 'account' ?>" class="nav-link">
                    <i class="fas fa-users"></i>
                    <p>Account</p>
                </a>
            </li>
            <!-- CATEGORY -->
            <li class="nav-item">
                <a href="<?= ADMIN_URL . 'category' ?>" class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <p>Categories</p>
                </a>
            </li>
            <!-- FOOD -->
            </li>
            <li class="nav-item">
                <a href="<?= ADMIN_URL . 'food' ?>" class="nav-link">
                    <i class="fas fa-pizza-slice"></i>
                    <p>
                        Food
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= ADMIN_URL . 'desk' ?>" class="nav-link">
                    <i class="fas fa-couch"></i>
                    <p>
                        Desk
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</aside>