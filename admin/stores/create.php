<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();

$pageName = "Add New Merchant";
$pageGroup = "Seller Center";
$currentGroup = ["Stores", "stores/index.php"];
$currentPage = "Create";

require __DIR__ . '/../../components/header.php';

$jsonData = file_get_contents(config("app.root") . 'assets/data/bangladesh.json');
$data = json_decode($jsonData, true);
$divisions = $data['divisions'];
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
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light py-0 my-0">Store Logo</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-6">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light h-100" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD SIZE 2MB)</span><br />
                          <span>(MIN. RES. 300X300)</span>
                        </p>
                      </div>
                      <input type="file" name="logo" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col-6">
                    <img id="dummy" src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
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
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light h-100" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD SIZE 2MB)</span><br />
                          <span>(MIN. RES. 1280X550)</span>
                        </p>
                      </div>
                      <input type="file" name="banner" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
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
                  <input type="text" name="name" class="form-control" id="name" placeholder="Store Name" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-scroll"></i></span>
                  <input type="text" name="tagline" class="form-control" id="tagline" placeholder="Store Tagline" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-at"></i></span>
                  <input type="text" name="slug" class="form-control" id="slug" placeholder="Store Slug" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <select name="owner" class="form-control" id="owner">
                    <option value="">-- Choose Owner --</option>
                  </select>
                </div>
                <hr>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" id="email" placeholder="info@example.com" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  <input type="tel" name="phone" class="form-control" id="phone" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fas fa-globe"></i></span>
                  <input type="url" name="website" class="form-control" id="website" placeholder="Website URL" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                  <input type="url" name="facebook" class="form-control" id="facebook" placeholder="Facebook URL" />
                </div>
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                  <input type="tel" name="whatsapp" class="form-control" id="whatsapp" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                </div>
                <hr>
                <div class="input-group input-group-sm">
                  <select name="category" class="form-control" id="category">
                    <option selected>-- Main Category --</option>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col d-grid">
                    <a href="index.php" class="btn btn-secondary btn-sm rounded-pill py-2">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">Discard</span>
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
                  <textarea name="description" class="form-control" id="description" cols="30" rows="20" placeholder="Type your details here ..."></textarea>
                </div>
                <hr>
                <div class="row g-3 mb-3">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="input-group input-group-sm">
                      <input type="text" name="address_one" class="form-control" id="line1" placeholder="Address Line 1" />
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="input-group input-group-sm">
                      <input type="text" name="address_two" class="form-control" id="line2" placeholder="Address Line 2" />
                    </div>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <select name="division" class="form-control" id="division" onchange="populateDistricts()" >
                        <option value="">-- Choose Division --</option>
                        <?php foreach ($divisions as $division) { ?>
                          <option value="<?= $division['name']?>"><?= $division['name']?></option>;
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <select name="district" class="form-control" id="district" >
                        <option value="">-- Choose District --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <input type="text" name="postal" class="form-control" id="postal" placeholder="Postal Code" />
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <div class="input-group input-group-sm">
                      <select name="status" class="form-control" id="status">
                        <option value="">-- Choose Status --</option>
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
  <script>
    var imgInp = document.getElementById("imageInput");
    var dummy = document.getElementById("dummy");
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        dummy.src = URL.createObjectURL(file)
      }
    }
    var divisions = <?= json_encode($divisions); ?>;
  </script>
</body>
</html>