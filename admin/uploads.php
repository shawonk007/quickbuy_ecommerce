<?php
require __DIR__ . '/../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Uploads";
$pageGroup = "Uploads Center";
$currentPage = "Uploads";
require __DIR__ . '/../components/header.php';
?>
<body>
  <?php require __DIR__ . "/../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../components/breadcrumb/admin/primary.php' ?>
    <section class="container-fluid my-5">
      <div class="card shadow py-5">
        <div class="card-body d-flex align-items-center justify-content-center">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 col-xxl-6 mx-auto"> <!-- Added mx-auto class for horizontal centering -->
              <div class="row">
                <div class="col my-1">
                  <div class="mt-2">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-5 h-100">
                        <h1><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h4 class="my-2 text-dark text-center"><strong>Click to upload</strong></h4>
                        <p class="mb-2 text-dark text-center">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD SIZE 2MB)</span><br />
                          <span>(MIN. RESOLUTION 700X700)</span>
                        </p>
                      </div>
                      <input type="file" name="file" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
                    </label>
                  </div>
                </div>
                <div class="col my-1">
                  <div class="mt-2">
                    <img src="../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-center mt-5 mb-3">
                <button type="submit" class="btn btn-success ps-5 pe-5" >
                  <i class="fas fa-upload"></i>
                  <span class="ps-2">Upload</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="container-fluid my-5">
      <div class="card shadow">
        <div class="card-body">
          <h3>Images Gallery</h3>
        </div>
      </div>
    </section>
    <section class="container-fluid my-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-tab-pane" type="button" role="tab" aria-controls="admin-tab-pane" aria-selected="false">Administrators</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="seller-tab" data-bs-toggle="tab" data-bs-target="#seller-tab-pane" type="button" role="tab" aria-controls="seller-tab-pane" aria-selected="false">Merchants</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="buyer-tab" data-bs-toggle="tab" data-bs-target="#buyer-tab-pane" type="button" role="tab" aria-controls="buyer-tab-pane" aria-selected="false">Customers</button>
        </li>
      </ul>
    </section>
    <section class="container-fluid tab-content my-5" id="myTabContent">
      <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-body">
            <div class="row row-cols-3 row-cols-lg-5 g-3 g-lg-3 py-3">
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 my-2">
                <div class="card">
                  <div class="card-body p-2">
                    <img src="https://via.placeholder.com/300X300" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
            </div>
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