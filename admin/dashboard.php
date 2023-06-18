<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$pageName = "Dashboard";
$pageGroup = "Dashboard";
$currentPage = "Dashboard";
$root = "/quickbuy/admin/";
require __DIR__ . '/../components/header/secondary.php';
// require_once 'header.php';
require __DIR__ . '../../vendor/autoload.php';
?>
<!-- <style>
  table th, td {
    font-size: 0.75rem;
  }
</style> -->
<body>
  <?php require __DIR__ . "/../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../components/breadcrumb/admin/primary.php' ?>
    <section class="container-fluid my-5">
      <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Category</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer py-0">
              <a href="<?= $root ?>category/index.php" class="nav-link text-center">
                <span>More info</span>
                <i class="fas fa-circle-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Products</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer py-0">
              <a href="<?= $root ?>products/index.php" class="nav-link text-center">
                <span>More info</span>
                <i class="fas fa-circle-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Merchants</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer py-0">
              <a href="<?= $root ?>stores/index.php" class="nav-link text-center">
                <span>More info</span>
                <i class="fas fa-circle-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Users & Members</h5>
            </div>
            <div class="card-body"></div>
            <div class="card-footer py-0">
              <a href="<?= $root ?>users/index.php" class="nav-link text-center">
                <span>More info</span>
                <i class="fas fa-circle-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid my-5">
      <div class="row row-col-3 g-3">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 col-xxl-7">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Latest Orders</h5>
            </div>
            <div class="card-body table-responsive p-2">
              <table class="table table-hover table-sm font-condensed">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Store Name</th>
                    <th scope="col">Order Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">QBO-0001</th>
                    <td>Sumona Akter Priya</td>
                    <td>Sumona's Fashion</td>
                    <td>2 minutes ago</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 col-xxl-5">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Best Sellers</h5>
            </div>
            <div class="card-body table-responsive p-2">
              <table class="table table-hover table-sm font-condensed">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Store Name</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Date Joined</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Sumona's Fashion</th>
                    <td>Sumona Akter Priya</td>
                    <td>2 minutes ago</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 col-xxl-7">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Top Products</h5>
            </div>
            <div class="card-body table-responsive p-2">
              <table class="table table-hover table-sm font-condensed">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Store Name</th>
                    <th scope="col">Date Created</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Party Handbag</th>
                    <td>QBP-0001</td>
                    <td>Sumona's Fashion</td>
                    <td>2 minutes ago</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 col-xxl-5">
          <div class="card">
            <div class="card-header pt-1 pb-0">
              <h5 class="card-title">Newly Registered</h5>
            </div>
            <div class="card-body table-responsive p-2">
              <table class="table table-hover table-sm font-condensed">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Name of User</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Date Joined</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Sumona Akter Priya</th>
                    <td>Merchant</td>
                    <td>2 minutes ago</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid my-5"></section>
  </main>
</body>
</html>