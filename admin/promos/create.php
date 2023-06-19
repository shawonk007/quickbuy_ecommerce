<?php
require __DIR__ . '../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Add New Coupon";
$pageGroup = "Coupons & Vouchers";
$currentGroup = ["Promo", "promos/index.php"];
$currentPage = "Create";
require __DIR__ . '/../../components/header/tertiary.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
    <section class="container-fluid d-flex align-items-center justify-content-center my-5">
      <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
        <form action="" method="post">
          <div class="card shadow">
            <div class="card-header bg-primary">
              <div class="row d-flex align-items-center">
                <div class="col-10 ">
                  <h4 class="card-title text-light">Create New Promo</h4>
                </div>
                <div class="col-2">
                  <a href="#" class="btn btn-light" onclick="history.back()">Back</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="input-group input-group-sm mb-3">
                <input type="text" name="" class="form-control" id="" placeholder="Promo Title" required />
              </div>
              <div class="row g-3">
                <div class="col">
                  <div class="input-group input-group-sm">
                    <input type="text" name="" class="form-control" id="" placeholder="XXXX-XXXX-XXXX" required />
                  </div>
                </div>
                <div class="col">
                  <div class="input-group input-group-sm">
                    <input type="text" name="" class="form-control" id="" placeholder="Discount Value" required />
                  </div>
                </div>
              </div>
              <div class="input-group input-group-sm my-3">
                <textarea name="" class="form-control" id="" cols="30" rows="8"></textarea>
              </div>
              <div class="row g-3 mb-3">
                <div class="col">
                  <div class="input-group input-group-sm">
                    <input type="datetime-local" name="" class="form-control" id="" placeholder="Discount Value" required />
                  </div>
                </div>
                <div class="col">
                  <div class="input-group input-group-sm">
                    <input type="datetime-local" name="" class="form-control" id="" placeholder="Discount Value" required />
                  </div>
                </div>
              </div>
              <div class="row g-3">
                <div class="col">
                  <div class="input-group input-group-sm">
                    <select name="" class="form-control" id="" required >
                      <option selected>-- Promo Type --</option>
                      <option value="1">Coupon</option>
                      <option value="2">Voucher</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="input-group input-group-sm">
                    <select name="" class="form-control" id="">
                      <option selected>-- Discount Type --</option>
                      <option value="1">Percent</option>
                      <option value="0">Flat</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="input-group input-group-sm">
                    <select name="" class="form-control" id="">
                      <option selected>-- Choose Status --</option>
                      <option value="1">Active</option>
                      <option value="0">Expire</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col d-grid">
                  <a href="index.php" class="btn btn-secondary rounded-pill">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ps-1">Previous</span>
                  </a>
                </div>
                <div class="col d-grid">
                  <button type="submit" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus"></i>
                    <span class="ps-1">Create New</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
</html>