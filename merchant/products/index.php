<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

<<<<<<< HEAD
// Auth::initialize();

// if (!isset($_SESSION['login'])) {
//   if (!Auth::check() || !Auth::isAdmin()) {
//     header("Location: ../../auth/login.php");
//     exit();
//   }
// }
=======
Auth::initialize();

if (!isset($_SESSION['login'])) {
  if (!Auth::check() || !Auth::isAdmin()) {
    header("Location: ../../auth/login.php");
    exit();
  }
}
>>>>>>> 2b59195ad61800ccdb78cfc6be7f06e03605a476

$db = new Database();

$pageName = "Manage Products";
$pageGroup = "Product Catalogue";
$currentPage = "Products";

require __DIR__ . '/../../components/header.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5">
      <a href="create.php" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span class="ps-1">Add New</span>
      </a>
    </section>
    <section class="container-fluid my-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="approve-tab" data-bs-toggle="tab" data-bs-target="#approve-tab-pane" type="button" role="tab" aria-controls="approve-tab-pane" aria-selected="false">Approved</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="reject-tab" data-bs-toggle="tab" data-bs-target="#reject-tab-pane" type="button" role="tab" aria-controls="reject-tab-pane" aria-selected="false">Rejected</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane" type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="false">Pending</button>
        </li>
      </ul>
    </section>
    <section class="container-fluid tab-content my-5" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Product Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="approve-tab-pane" role="tabpanel" aria-labelledby="approve-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Product Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="reject-tab-pane" role="tabpanel" aria-labelledby="reject-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Product Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Product Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>