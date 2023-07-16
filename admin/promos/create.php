<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();

$pageName = "Add New Coupon";
$pageGroup = "Coupons & Vouchers";
$currentGroup = ["Promo", "promos/index.php"];
$currentPage = "Create";

require __DIR__ . '/../../components/header.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
    <section class="container-fluid d-flex align-items-center justify-content-center my-5">
      <div class="col-12 col-sm-12 col-md-8 col-lg-7 col-xl-7 col-xxl-7">
        <form action="<?= config("app.root")?>src/actions/promo/store.php" method="post">
          <div class="card shadow">
            <div class="card-header bg-primary py-1">
              <h4 class="card-title text-light py-0 my-0">Create New Promo</h4>
            </div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Promo Title" required />
                </div>
                <div class="col-6">
                  <div class="input-group input-group-sm">
                    <button class="btn bg-secondary-subtle" type="button" id="makePromo">
                      <i class="fas fa-refresh"></i>
                    </button>
                    <input type="text" name="code" class="form-control form-control-sm text-center" id="promoInput" placeholder="XXXX-XXXX-XXXX" style="text-transform: uppercase;" required />
                  </div>
                </div>
                <div class="col-6">
                  <select name="merchant" class="select2 select2-bootstrap-5-theme w-100" id="storeName" >
                    <option value="">-- Choose Merchant --</option>
                  </select>
                </div>
                <div class="col-12">
                  <textarea name="description" class="form-control form-control-sm" id="description" cols="30" rows="8"></textarea>
                </div>
                <div class="col-4">
                  <select name="p_type" class="form-control form-control-sm" id="pType" required >
                    <option selected>-- Promo Type --</option>
                    <option value="1">Coupon</option>
                    <option value="2">Voucher</option>
                  </select>
                </div>
                <div class="col-4">
                  <select name="d_type" class="form-control form-control-sm" id="dType" required >
                    <option selected>-- Discount Type --</option>
                    <option value="1">Percent</option>
                    <option value="2">Flat</option>
                  </select>
                </div>
                <div class="col-4">
                  <input type="text" name="discount" class="form-control form-control-sm" id="discount" placeholder="Discount Value" required />
                </div>
                <div class="col-4">
                  <input type="datetime-local" name="start" class="form-control form-control-sm" id="start" required />
                </div>
                <div class="col-4">
                  <input type="datetime-local" name="expire" class="form-control form-control-sm" id="end" required />
                </div>
                <div class="col-4">
                  <select name="status" class="form-control form-control-sm" id="status">
                    <option value="">-- Choose Status --</option>
                    <option value="1">Active</option>
                    <option value="0">Expire</option>
                  </select>
                </div>
                <div class="col-12">
                  <textarea name="restriction" class="form-control form-control-sm" id="restriction" cols="30" rows="3"></textarea>
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
  <script>
    $(document).ready(function() {
      $('#storeName').select2({
        theme: 'bootstrap-5'
      });
      $('.select2-container .select2-selection--single').css({
        'padding': '5px 10px',
        'font-size': '12px'
      });
      $("#makePromo").click(function() {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        var promoCode = '';
        for (var i = 0; i < 12; i++) {
          var randomIndex = Math.floor(Math.random() * characters.length);
          promoCode += characters.charAt(randomIndex);
          if ((i + 1) % 4 === 0 && i !== 11) {
            promoCode += '-';
          }
        }
        $("#promoInput").val(promoCode);
      });
    });
  </script>
</body>
</html>