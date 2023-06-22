<?php
require __DIR__ . '../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Add New Merchant";
$pageGroup = "Seller Center";
$currentGroup = ["Stores", "stores/index.php"];
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
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row row-cols-3 row-cols-lg-5 g-3 g-lg-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-primary pb-0">
                <h5 class="card-title text-light">Store Logo</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-3 h-100">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD SIZE 2MB)</span><br />
                          <span>(MIN. RESOLUTION 700X700)</span>
                        </p>
                      </div>
                      <input type="file" name="file" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
            <div class="card shadow">
              <div class="card-header bg-primary pb-0">
                <h5 class="card-title text-light">Store Banner</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-3">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-3 h-100">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD SIZE 2MB)</span><br />
                          <span>(MIN. RESOLUTION 700X700)</span>
                        </p>
                      </div>
                      <input type="file" name="file" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col-9">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" style="aspect-ratio: 3.35/1;" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-primary pb-0">
                <h5 class="card-title text-light">Store Informations</h5>
              </div>
              <div class="card-body">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-store"></i></span>
                  <input type="text" name="" class="form-control" id="" placeholder="Store Name" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-scroll"></i></span>
                  <input type="text" name="" class="form-control" id="" placeholder="Store Tagline" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-at"></i></span>
                  <input type="text" name="" class="form-control" id="" placeholder="Store Slug" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <select name="" class="form-control" id="">
                    <option selected>-- Choose Owner --</option>
                  </select>
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" name="" class="form-control" id="" placeholder="info@example.com" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  <input type="tel" name="phone" class="form-control" id="" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-globe"></i></span>
                  <input type="url" name="" class="form-control" id="" placeholder="Website URL" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                  <input type="url" name="" class="form-control" id="" placeholder="Facebook URL" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                  <input type="tel" name="" class="form-control" id="" placeholder="+88 (01X) XX-XXXXXX" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <select name="" class="form-control" id="">
                    <option selected>-- Main Category --</option>
                  </select>
                </div>
                <div class="input-group input-group-sm mb-3">
                  <select name="" class="form-control" id="">
                    <option selected>-- Sub Category --</option>
                  </select>
                </div>
                <div class="input-group input-group-sm">
                  <select name="" class="form-control" id="">
                    <option selected>-- Product Type --</option>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col d-grid">
                    <a href="index.php" class="btn btn-secondary btn-sm rounded-pill py-2">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">Previous</span>
                    </a>
                  </div>
                  <div class="col d-grid">
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill py-2">
                      <i class="fas fa-plus"></i>
                      <span class="ps-1">Create New</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
            <div class="card shadow">
              <div class="card-header bg-primary pb-0">
                <h5 class="card-title text-light">Store Details</h5>
              </div>
              <div class="card-body">
                <div class="input-group input-group-sm mb-3">
                  <textarea name="" class="form-control" id="" cols="30" rows="20" placeholder="Type your details here ..."></textarea>
                </div>
                <hr>
                <div class="input-group input-group-sm my-3">
                  <textarea name="" class="form-control" id="" cols="30" rows="4" placeholder="Type your address here ..."></textarea>
                </div>
                <div class="row g-3">
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose Division --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose District --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Postal Code" />
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Choose Status --</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
</body>
</html>