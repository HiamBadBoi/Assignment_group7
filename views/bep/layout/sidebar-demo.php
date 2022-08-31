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
                <a href="<?= BASE_URL.'chef'?>" class="nav-link">
                    <i class="fas fa-pizza-slice"></i>
                    <p>
                        Chưa hoàn thành
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= CHEF_URL . 'done'?>" class="nav-link">
                    <i class="fas fa-couch"></i>
                    <p>
                        Đã hoàn thành
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</aside>