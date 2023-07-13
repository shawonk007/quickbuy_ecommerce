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
<aside class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="yourCart" aria-labelledby="yourCartLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="yourCartLabel">Your Cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <table class="table">
      <thead>
        <tr>
          <th>Thumbnail</th>
          <th>Product Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <img src="https://via.placeholder.com/80x80" alt="" />
          </td>
          <td>
            <h6 class="py-0 my-0">HP Elitebook 8440p</h6>
            <p class="py-1 my-1">Laptop</p>
            <p class="py-0 my-0">25,000.00</p>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="row g-3 position-absolute w-100 bottom-0 pe-3 pb-3"  >
      <div class="col d-grid">
        <a href="cart.php" class="btn btn-primary ps-3 pe-3">
          <i class="fas fa-eye"></i>
          <strong class="ps-2">View Cart</strong>
        </a>
      </div>
      <div class="col d-grid">
        <a href="checkout.php" class="btn btn-primary ps-3 pe-3">
          <i class="fas fa-cart-shopping"></i>
          <strong class="ps-2">Checkout</strong>
        </a>
      </div>
    </div>
  </div>
</aside>