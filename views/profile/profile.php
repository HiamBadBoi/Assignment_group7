<div class="profile">
    <div class="profile-avatar">
        <img src="<?= IMAGE_URL . 'avatars/' . $_SESSION['login']['image'] ?>" alt="" class="img-circle img-fluid">
    </div>
    <a href="<?php echo BASE_URL . 'logout/submit' ?>">
        <div class="btn btn-outline-danger btn-logout">Sign Out</div>
    </a>
    <h4 class="profile-name"><?= $_SESSION['login']['name'] ?></h4>
    <div class="profile-role">
        <p><?= $_SESSION['login']['role'] ?></p>
    </div>
</div>