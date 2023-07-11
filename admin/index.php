<?php
require __DIR__ . '/../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;
$db = new Database();

Auth::initialize();

if (!isset($_SESSION['login'])) {
  if (!Auth::check() || !Auth::isAdmin()) {
    header("Location: login.php");
    exit();
  }
}

$pageName = "Dashboard";
$pageGroup = "Dashboard";
$currentPage = "Dashboard";

$root = config("app.admin");
require __DIR__ . '/../components/header.php';
?>
<style>
  @import url("https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css");
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap-world-mill.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css"> -->
<body class="scrollable-content">
  <?php require __DIR__ . "/../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../components/breadcrumb/admin/primary.php' ?>
    <section class="container-fluid my-5">
      <div class="row g-2 g-md-3">
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header bg-warning border-bottom-0 py-1">
              <h6 class="card-title text-light font-bold py-0 my-0"><b>Category</b></h6>
            </div>
            <div class="card-body bg-warning">
              <div class="d-flex align-items-center justify-content-between">
                <h1>
                  <i class="fas fa-tags dashboard-icon" ></i>
                </h1>
                <h1 class="font-cursive text-light">99+</h1>
              </div>
            </div>
            <div class="card-footer bg-warning py-0">
              <a href="<?= $root ?>category/index.php" class="nav-link text-light text-center">
                <strong>More info</strong>
                <i class="fas fa-circle-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header bg-primary border-bottom-0 py-1">
              <h6 class="card-title text-light font-bold py-0 my-0"><b>Products</b></h6>
            </div>
            <div class="card-body bg-primary">
              <div class="d-flex align-items-center justify-content-between">
                <h1>
                  <i class="fas fa-cubes dashboard-icon"></i>
                </h1>
                <h1 class="font-cursive text-light">99+</h1>
              </div>
            </div>
            <div class="card-footer bg-primary py-0">
              <a href="<?= $root ?>products/index.php" class="nav-link text-light text-center">
                <strong>More info</strong>
                <i class="fas fa-circle-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header bg-success border-bottom-0 py-1">
              <h6 class="card-title text-light font-bold py-0 my-0"><b>Merchants</b></h6>
            </div>
            <div class="card-body bg-success">
              <div class="d-flex align-items-center justify-content-between">
                <h1>
                  <i class="fas fa-store dashboard-icon"></i>
                </h1>
                <h1 class="font-cursive text-light">99+</h1>
              </div>
            </div>
            <div class="card-footer bg-success py-0">
              <a href="<?= $root ?>stores/index.php" class="nav-link text-light text-center">
                <strong>More info</strong>
                <i class="fas fa-circle-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header bg-danger border-bottom-0 py-1">
              <h6 class="card-title text-light font-bold py-0 my-0"><b>Users & Members</b></h6>
            </div>
            <div class="card-body bg-danger">
              <div class="d-flex align-items-center justify-content-between">
                <h1>
                  <i class="fas fa-user-plus dashboard-icon"></i>
                </h1>
                <h1 class="font-cursive text-light">99+</h1>
              </div>
            </div>
            <div class="card-footer bg-danger py-0">
              <a href="<?= $root ?>users/index.php" class="nav-link text-light text-center">
                <strong>More info</strong>
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
            <div class="card-header bg-primary py-1">
              <h5 class="card-title text-light font-bold py-0 my-0">Latest Orders</h5>
            </div>
            <div class="card-body table-responsive-lg ps-2 pe-2 py-3">
              <table class="table table-hover table-sm font-condensed home-data-table py-3">
                <thead class="table-info">
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
            <div class="card-header bg-primary py-1">
              <h5 class="card-title text-light font-bold py-0 my-0">Best Sellers</h5>
            </div>
            <div class="card-body table-responsive-lg ps-2 pe-2 py-3">
              <table class="table table-hover table-sm font-condensed home-data-table py-3">
                <thead class="table-secondary">
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
            <div class="card-header bg-primary py-1">
              <h5 class="card-title text-light font-bold py-0 my-0">Top Products</h5>
            </div>
            <div class="card-body table-responsive-lg ps-2 pe-2 py-3">
              <table class="table table-hover table-sm font-condensed home-data-table py-3">
                <thead class="table-secondary">
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
            <div class="card-header bg-primary py-1">
              <h5 class="card-title text-light font-bold py-0 my-0">Newly Registered</h5>
            </div>
            <div class="card-body table-responsive-lg ps-2 pe-2 py-3">
              <table class="table table-hover table-sm font-condensed home-data-table py-3">
                <thead class="table-secondary">
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
    <section class="container-fluid my-5">
      <div>
        <canvas id="myChart"></canvas>
      </div>
    </section>
    <section class="container-fluid my-5"></section>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        title: {
          display: true,
          text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
        }
      }
    }
  });
</script>
</body>
</html>