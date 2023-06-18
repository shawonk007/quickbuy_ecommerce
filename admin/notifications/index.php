<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$pageName = "Notifications";
$pageGroup = "Notifications";
$currentGroup = ["Notifications", "notifications/index.php"];
$currentPage = "Index";
require __DIR__ . '/../../components/header/tertiary.php';
require __DIR__ . '../../../vendor/autoload.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
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
          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-tab-pane" type="button" role="tab" aria-controls="admin-tab-pane" aria-selected="false">Comments</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="seller-tab" data-bs-toggle="tab" data-bs-target="#seller-tab-pane" type="button" role="tab" aria-controls="seller-tab-pane" aria-selected="false">Reports</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="buyer-tab" data-bs-toggle="tab" data-bs-target="#buyer-tab-pane" type="button" role="tab" aria-controls="buyer-tab-pane" aria-selected="false">Reviews</button>
        </li>
      </ul>
    </section>
    <section class="container-fluid tab-content my-5" id="myTabContent">
      <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body">
            <!-- <h4>All Promo Cards</h4> -->
            <form action="" method="post" >
              <div class="w-100 d-flex align-items-center justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 col-xxl-8">
                  <div class="input-group">
                    <input type="search" name="" class="form-control" id="" placeholder="Type here to search ..." />
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-magnifying-glass"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Name of Users</th>
                  <th scope="col">Promo Code</th>
                  <th scope="col">User Role</th>
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
          <div class="card-body">
            <!-- <h4>Coupon Cards</h4> -->
            <form action="" method="post" >
              <div class="w-100 d-flex align-items-center justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 col-xxl-8">
                  <div class="input-group">
                    <input type="search" name="" class="form-control" id="" placeholder="Type here to search ..." />
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-magnifying-glass"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <table class="table">
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
          <div class="card-body">
            <!-- <h4>Voucher Cards</h4> -->
            <form action="" method="post" >
              <div class="w-100 d-flex align-items-center justify-content-center my-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 col-xxl-8">
                  <div class="input-group">
                    <input type="search" name="" class="form-control" id="" placeholder="Type here to search ..." />
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-magnifying-glass"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <table class="table">
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