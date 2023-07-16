<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();

$pageName = "Manage Coupons";
$pageGroup = "Coupons & Vouchers";
$currentPage = "Promos";

require __DIR__ . '/../../components/header.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
    <section class="container-fluid my-5">
      <a href="create.php" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span class="ps-1">Add New</span>
      </a>
    </section>
    <section class="container-fluid my-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">All</button>
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
      <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
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
</body>
</html>