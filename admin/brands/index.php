<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;
use App\Class\Brands;

<<<<<<< HEAD
// Auth::initialize();

// if (!isset($_SESSION['login'])) {
//   if (!Auth::check() || !Auth::isAdmin()) {
//     header("Location: ../login.php");
//     exit();
//   }
// }
=======
Auth::initialize();

if (!isset($_SESSION['login'])) {
  if (!Auth::check() || !Auth::isAdmin()) {
    header("Location: ../login.php");
    exit();
  }
}
>>>>>>> 2b59195ad61800ccdb78cfc6be7f06e03605a476

$db = new Database();
$brands = new Brands($db->conn);

$pageName = "Manage Brands";
$pageGroup = "Brands & Manufacturer";
$currentPage = "Brands";



require __DIR__ . '/../../components/header.php';
?>
<style>
  .dataTables_wrapper .dataTables_paginate {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/primary.php' ?>
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
          <button class="nav-link" id="coupon-tab" data-bs-toggle="tab" data-bs-target="#coupon-tab-pane" type="button" role="tab" aria-controls="coupon-tab-pane" aria-selected="false">Coupons</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="voucher-tab" data-bs-toggle="tab" data-bs-target="#voucher-tab-pane" type="button" role="tab" aria-controls="voucher-tab-pane" aria-selected="false">Vouchers</button>
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
                  <th scope="col">Logo</th>
                  <th scope="col">Brand Title</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $brandList = $brands->index();
                foreach ($brandList as $k => $brand) {
                  $statusLabel = "";
                  $statusClass = "";
                  if ($brand['brand_status'] == 1) {
                    $statusLabel = "Active";
                    $statusClass = "bg-success";
                  } elseif ($brand['brand_status'] == 0) {
                    $statusLabel = "Deactive";
                    $statusClass = "bg-danger";
                  } else {
                    $statusLabel = "Pending";
                    $statusClass = "bg-secondary";
                  } ?>
                <tr>
                  <th scope="row"><?= $k+1 ?></th>
                  <td>
                    <img src="<?= isset($brand['brand_logo']) ? config("app.root") . 'uploads/brands/' . $brand['brand_logo'] : config("app.root") . 'assets/images/dummy-square.jpg' ?>" width="30" alt="" />
                  </td>
                  <td><?= $brand['brand_title'] ?></td>
                  <td><?= $brand['brand_slug'] ?></td>
                  <td>
                    <span class="badge <?= $statusClass ?>"><?= $statusLabel ?></span>
                  </td>
                  <td>
                      <a href="edit.php?id=<?= $brand['brand_id'] ?>" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <!-- <button type="button" class="btn btn-outline-success btn-sm view-role" data-bs-toggle="modal" data-bs-target="#viewRole" data-role-id="<?= $role['role_id'] ?>" >
                        <i class="fas fa-eye"></i>
                      </button> -->
                      <!-- <button type="submit" class="btn btn-outline-danger btn-sm" onclick="deleteBrand(<?= $brand['brand_id'] ?>)" > -->
                      <button type="submit" class="btn btn-outline-danger btn-sm" onclick="deleteBrand()" >
                        <i class="fas fa-trash-alt"></i>
                      </button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="coupon-tab-pane" role="tabpanel" aria-labelledby="coupon-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Promo Title</th>
                  <th scope="col">Promo Code</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="voucher-tab-pane" role="tabpanel" aria-labelledby="voucher-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body py-5">
            <table class="table data-table py-5">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Promo Title</th>
                  <th scope="col">Promo Code</th>
                  <th scope="col">Promo Type</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Coupon</td>
                  <td>XXXX-XXXX-XXXX</td>
                  <td>Coupon</td>
                  <td>Active</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
  </script>
</body>
</html>