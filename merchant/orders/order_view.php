<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "order-view";
$pageGroup = "order-view";
$currentGroup = ["Marchent", "users/index.php"];
$currentPage = "order-view";
require __DIR__ . '/../../components/header.php';
// require_once "../connection.php";
?>

<body>
<?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
    <section class="mx-3">
      <div class="container-fluid">
        <!-- Sidebar left -->
        <div class="">
          <div class="row g-3">
            <div class="col-12  col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
              <div class="card ">
                <div class="card-header pb-0">
                  <h6 class="fw-bold">Billing address</h6>
                </div>
                <div class="card-body">
                  <div class="">
                    <div class="d-inline">
                      <span class="d-inline"><i class="fa-solid fa-user"></i></span>
                      <h6 class="fw-bold d-inline"> Pam Leslie</h6>
                      <div>
                        <span><i class="fa-solid fa-envelope"></i> Email - </span><a class="text-dark text-decoration-none" href="mailto:shop4pjl@example.com">shop4pjl@example.com</a><br>
                        <span><i class="fa-solid fa-phone"></i> Phone - </span><a class="d-inline text-dark" href="tel:+1(800)777-7777">+1(800)777-7777</a>
                      </div>
                    </div>
                  </div>
                  <div class="d-inline">
                    <span class="d-inline"><i class="fa-solid fa-truck"></i></span>
                    <p class="d-inline">(585) 382-9367 2561 Kingston Rd Leicester, New York(NY)</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
              <div class="card">
                <div class="card-header pb-0">
                  <h6 class="fw-bold">Shipping address</h6>
                </div>
                <div class="card-body">
                  <div class="">
                    <div class="d-inline">
                      <span class="d-inline"><i class="fa-solid fa-user"></i></span>
                      <h6 class="fw-bold d-inline"> Pam Leslie
                      </h6>
                      <div>
                        <span><i class="fa-solid fa-envelope"></i> Email - </span><a class="text-dark text-decoration-none" href="mailto:shop4pjl@example.com">shop4pjl@example.com</a><br>
                        <span><i class="fa-solid fa-phone"></i> Phone - </span><a class="d-inline text-dark" href="tel:+1(800)777-7777">+1(800)777-7777</a>
                      </div>
                    </div>
                  </div>
                  <div class="d-inline">
                    <span class="d-inline"><i class="fa-solid fa-truck"></i></span>
                    <p class="d-inline">(678) 574-8262 3825 Heartleaf Dr NW Acworth, Georgia(GA)</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--elm_sidebar-->
        </div>
        <!--Content-->
            <form action="" method="post" name="">
                  <div class="my-4">
                    
                  <div class="table-responsive my-3">
                      <table width="100%" class="table" style="width: 1060px;">
                        <thead>
                          <tr>
                            <th colspan="2" width="50%">Product</th>
                            <th width="10%">Price</th>
                            <th class="center" width="10%">Quantity</th>
                            <th width="10%" class="right">Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="">
                                <a class="" href="">
                                  <img src="https://i.pravatar.cc/200" width="85" height="85" class="rounded">
                                </a>
                              </div>
                            </td>
                            <td class="d-flex d-inline g-3">
                              <div>
                                <div class="">
                                  <a class="fw-semibold text-decoration-none text-dark d-inline">Keurig - K-Mini K15 Single-Serve K-Cup Pod Coffee Maker - Black Plum</a>
                                  <div class="text-secondary">
                                    <small>Gender:</small>
                                    <small class="">Unisex</small>
                                  </div>
                                  <div class="text-secondary">
                                    <small>Color:</small>
                                    <small class="">Black</small>
                                  </div>
                                  <div class="text-secondary">
                                    <small>Size:</small>
                                    <small class="">One size</small>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="" data-th="Price">
                              <span class="">৳ 99.99</span>
                            </td>
                            <td class="center" data-th="Quantity">
                              01<br>
                            </td>
                            <td class="right" data-th="Subtotal"><span>
                                <span class="">৳ 99.99</span>
                              </span></td>
                          </tr>
                          <tr>
                            <td>
                              <div class="">
                                <a class="" href="">
                                  <img src="https://i.pravatar.cc/220" width="85" height="85" class="rounded">
                                </a>
                              </div>
                            </td>
                            <td class="d-flex d-inline g-3">
                              <div>
                                <div class="">
                                  <a class="fw-semibold text-decoration-none text-dark d-inline">POSHI Premium Quality Casual Stainless Steel Waterproof Chronograph Quartz Watch For Men</a>
                                  <div class="text-secondary">
                                    <small>Gender:</small>
                                    <small class="">Unisex</small>
                                  </div>
                                  <div class="text-secondary">
                                    <small>Color:</small>
                                    <small class="">Black</small>
                                  </div>
                                  <div class="text-secondary">
                                    <small>Size:</small>
                                    <small class="">One size</small>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="" data-th="Price">
                              <span class="">৳ 450</span>
                            </td>
                            <td class="center" data-th="Quantity">
                              03<br>
                            </td>
                            <td class="right" data-th="Subtotal"><span>
                                <span class="">৳ 1350</span>
                              </span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
            </form>
            <div class="row mb-5">
              <div class="col-6">
                  <h4></h4>
              </div>
              <div class="col-6 ">
                <div class="row">
                  <div class="col-8 text-center h5"><span>Total Amount :</span></div>
                  <div class="col-4 h5 pe-5"><span>৳3453</span></div>
                </div>
              </div>
            </div>
        </div>
        <!--/Content-->
        <!-- Sidebar -->
      </div>
    </section>
  </main>
</body>

</html>