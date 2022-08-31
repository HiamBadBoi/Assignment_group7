<header class="header">
    <div class="left">
        <img src="<?= IMAGE_URL ?>header/grandrestaurant_logo.png" alt="" width="70%">
    </div>
    <div class="right">
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?= ($_SESSION['login']['name']) ?? ''; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="<?= BASE_URL . 'admin' ?>">Admin</a></li>
                <li><a class="dropdown-item" href="<?= BASE_URL . 'logout/submit' ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</header>