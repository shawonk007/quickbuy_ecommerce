<?php $root = config("app.root") ?>
<nav class="navbar navbar-expand-lg navbar-light customer-navbar sticky-top">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <ul class="navbar-nav flex-row text-white mb-0">
      <li class="nav-item me-3">
        <a class="nav-link" aria-current="page" href="<?= $root ?>home.php">
          <i class="fas fa-house"></i>
          <span class="ps-1">Homepage</span>
        </a>
      </li>
      <li class="nav-item ms-3">
        <a class="btn btn-outline-primary ps-4 pe-4" aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#yourCart" aria-controls="yourCart" >
          <i class="fas fa-shopping-cart"></i>
          <span class="ps-2">0</span>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
            <!-- <span class="ps-1">My Account</span> -->
            <span class="ps-1">Profile</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end py-0" style="min-width: 250px;">
            <div class="card">
              <div class="card-header ps-2 pe-2 pt-2 pb-0 mb-0">
                <div class="row pb-0 mb-0 g-4">
                  <div class="col-auto position-relative pb-0">
                    <div>
                      <img src="https://via.placeholder.com/50x50" class="rounded-circle" alt="" />
                      <span class="text-success position-absolute" style="bottom: 0.85rem; right: 0.5rem;"><i class="fas fa-circle"></i></span>
                    </div>
                  </div>
                  <div class="col-auto pb-0">
                    <h6><?= $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'] ?></h6>
                    <p>
                      <i class="fas fa-at"></i>
                      <span class=""><?= $_SESSION['user']['username'] ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="card-body p-2">
                <a class="dropdown-item" href="<?= $root ?>/profile.php">Edit Profile</a>
                <hr class="dropdown-divider my-0">
                <a class="dropdown-item" href="<?= $root ?>settings.php">Settings</a>
              </div>
              <div class="card-footer bg-danger py-0">
                <a class="dropdown-item bg-danger text-center" href="auth/logout.php">
                  <i class="fas fa-power-off"></i>
                  <span>Logout</span>
                </a>
              </div>
            </div>
            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider my-0"></li>
            <li>
              <a class="dropdown-item bg-danger text-center" href="#">
                <i class="fas fa-power-off"></i>
                <span>Logout</span>
              </a>
            </li> -->
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>