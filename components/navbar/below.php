<?php // $auth = "/quickbuy/auth/"; ?>
<?php $auth = config("app.auth"); ?>
<nav class="navbar navbar-expand-lg bg-primary-subtle shadow-sm sticky-top py-3">
  <div class="container">
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#browseCategories" aria-controls="browseCategories">
      <i class="fas fa-list-check"></i>
      <span class="ps-2">Browse Categories</span>
    </button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex d-lg-none pt-4 pb-3 py-lg-0" role="search">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
          <button type="submit" class="btn btn-primary" >
            <i class="fas fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
      <ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active ps-4 pe-4" aria-current="page" href="home.php">
            <span class="">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-4 pe-4" href="about.php">
            <span class="">About</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-4 pe-4" href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-4 pe-4" href="#">Stores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ps-4 pe-4" href="contact.php">Contact</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link ps-4 pe-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= $auth ?>login.php">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= $auth ?>register.php">Register</a></li>
          </ul>
        </li> -->
      </ul>
      <ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link ps-4 pe-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user"></i>
            <span class="ps-1">Account</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="admin/dashboard.php">Admin</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= $auth ?>login.php">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= $auth ?>register.php">Register</a></li>
          </ul>
        </li>
        <li class="nav-item d-none d-lg-block">
          <a class="btn btn-outline-primary ps-4 pe-4" aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#yourCart" aria-controls="yourCart" >
            <i class="fas fa-shopping-cart"></i>
            <span class="ps-sm-2">0</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="browseCategories" aria-labelledby="browseCategoriesLabel">
  <div class="offcanvas-header">
    <img src="<?= info()['logo'] ?>" style="width: 200px;" alt="logo" />
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="" method="post" class="d-flex pt-4 pb-3 py-lg-0 mb-4" role="search">
      <div class="input-group">
        <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
        <button type="submit" class="btn btn-outline-primary" >
          <i class="fas fa-magnifying-glass"></i>
        </button>
      </div>
    </form>
    <ul class="navbar-nav list-group list-group-flush">
    <!-- <ul class="navbar-nav"> -->
      <?php
        $category = [
          "Phone & Accessories",
          "Computer & Peripherals",
          "Consumer Electronics",
          "Fashion & Appearels",
          "Shoes & Footware",
          "Food & Beverages",
          "Home Appliances",
          "Electronics Components",
          "Electrical Equipments",
          "Office & Stationary",
          "Luggage, Bags & Cases",
          "Furniture & Decors",
          "Home Furnitures",
          "Surveillance & Security",
          "Sports & Entertainments",
          "Tools & Hardware",
          "Gifts & Crafts",
          "Toys & Hobbies",
          "Health & Medical",
          "Home Textile",
          "Lights & Lighting",
        ];
        asort($category);
        foreach ($category as $key => $value) { 
        ?>
          <li class="nav-item list-group-item">
            <a href="#" class="nav-link py-0"><?= $value ?></a>
          </li>
        <?php 
        }
      ?>
    </ul>
  </div>
</div>