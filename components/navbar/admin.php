<?php $admin = config("app.admin") ?>
<nav class="navbar navbar-expand-lg navbar-dark admin-navbar sticky-top">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <ul class="navbar-nav flex-row mb-2 mb-lg-0">
      <li class="nav-item me-3 me-lg-0">
        <a class="nav-link" aria-current="page" href="<?= $admin ?>dashboard.php">
          <i class="fas fa-house"></i>
          <span class="ps-1">Home</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-plus"></i>
          <!-- <span class="ps-1">New Items</span> -->
          <span class="ps-1">New</span>
        </a>
        <ul class="dropdown-menu py-1">
          <li>
            <a class="dropdown-item text-dark" href="<?= $admin ?>posts/create.php">
              <i class="fas fa-plus"></i>
              <span class="ps-2">Add New Post</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider my-1">
          </li>
          <li>
            <a class="dropdown-item text-dark" href="<?= $admin ?>brands/create.php">
              <i class="fas fa-plus"></i>
              <span class="ps-2">Add New Brand</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider my-1">
          </li>
          <li>
            <a class="dropdown-item text-dark" href="<?= $admin ?>promos/create.php">
              <i class="fas fa-plus"></i>
              <span class="ps-2">Add New Promo</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider my-1">
          </li>
          <li>
            <a class="dropdown-item text-dark" href="<?= $admin ?>category/create.php">
              <i class="fas fa-plus"></i>
              <span class="ps-2">Add New Category</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider my-1">
          </li>
          <li>
            <a class="dropdown-item text-dark" href="<?= $admin ?>products/create.php">
              <i class="fas fa-plus"></i>
              <span class="ps-2">Add New Product</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider my-1">
          </li>
          <li>
            <a class="dropdown-item text-dark" href="<?= $admin ?>stores/create.php">
              <i class="fas fa-plus"></i>
              <span class="ps-2">Add New Mechant</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider my-1">
          </li>
          <li>
            <a class="dropdown-item text-dark" href="<?= $admin ?>users/create.php">
              <i class="fas fa-plus"></i>
              <span class="ps-2">Add New User</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="" method="post" class="d-flex ms-auto col-lg-7" role="search">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Search" aria-label="Search">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                  <div class="col-3 position-relative pb-0">
                    <img src="https://via.placeholder.com/50x50" class="rounded-circle" alt="" />
                    <span class="text-success position-absolute" style="bottom: 0.85rem; right: 0;"><i class="fas fa-circle"></i></span>
                  </div>
                  <div class="col-9 pb-0">
                    <h6>Shawon Khan</h6>
                    <p>Administrator</p>
                  </div>
                </div>
              </div>
              <div class="card-body p-2">
                <a class="dropdown-item" href="#">Edit Profile</a>
                <hr class="dropdown-divider my-0">
                <a class="dropdown-item" href="#">Settings</a>
              </div>
              <div class="card-footer bg-danger py-0">
                <a class="dropdown-item bg-danger text-center" href="#">
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