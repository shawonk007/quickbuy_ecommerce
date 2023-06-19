<?php
require __DIR__ . '../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Add New Product";
$pageGroup = "Category & Product";
$currentGroup = ["Products", "products/index.php"];
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
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Overview</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="input-group input-group-sm">
                    <input type="text" name="" class="form-control" id="" placeholder="Product Title" />
                  </div>
                  <div class="input-group input-group-sm">
                    <textarea name=""class="form-control" id="" cols="30" rows="8" placeholder="Type product highlights here ..."></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow my-4">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Details</h5>
              </div>
              <div class="card-body">
                <div class="row g-3 mb-3">
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Main Category --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Sub Category --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Product Type --</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="input-group input-group-sm">
                  <textarea name=""class="form-control" id="" cols="30" rows="20" placeholder="Type product description here ..."></textarea>
                </div>
                <div class="row g-3 mt-0 mb-0">
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Weight (kg.)" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Length (cm.)" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Width (cm.)" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Height (cm.)" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <div class="row d-flex align-items-center justify-content-between py-0">
                  <div class="col-9">
                    <h5 class="card-title text-light font-bold py-0 my-0">Product Attributes</h5>
                  </div>
                  <div class="col-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-light btn-sm py-0">
                      <i class="fas fa-plus"></i>
                      <strong class="ps-1">Add New</strong>
                    </button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table pb-0 mb-0">
                  <thead class="table-info">
                    <tr>
                      <th class="py-1" >Attribute Set</th>
                      <th class="py-1" >Attribute Type</th>
                      <th class="py-1" >Arrtibute Value</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="input-group input-group-sm">
                          <select name="" class="form-control" id="" disabled >
                            <option selected>-- Choose One --</option>
                          </select>
                        </div>
                      </td>
                      <td>
                        <div class="input-group input-group-sm">
                          <select name="" class="form-control" id="" disabled >
                            <option selected>-- Choose One --</option>
                          </select>
                        </div>
                      </td>
                      <td>
                        <div class="input-group input-group-sm">
                          <input type="text" name="" class="form-control" id="" placeholder="Product Title" disabled />
                        </div>
                      </td>
                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="" value="" />
                          <button type="submit" class="btn btn-danger btn-sm" disabled >
                            <i class="fas fa-trash-alt"> </i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Informations</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="input-group input-group-sm">
                    <input type="text" name="" class="form-control" id="" placeholder="Product SKU" />
                  </div>
                  <div class="input-group input-group-sm">
                    <input type="text" name="" class="form-control" id="" placeholder="Product Slug" />
                  </div>
                </div>
                <div class="row g-3 mt-0 mb-3">
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Regular Price" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Offer Price" />
                    </div>
                  </div>
                </div>
                <div class="input-group input-group-sm">
                  <select name="" class="form-control" id="">
                    <option selected>-- Store Name --</option>
                  </select>
                </div>
                <div class="row g-3 mt-0 mb-2">
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Availability --</option>
                        <option value="1">In Stock</option>
                        <option value="0">Out of Stock</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <input type="text" name="" class="form-control" id="" placeholder="Stock Quantity" />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Brand Name --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <select name="" class="form-control" id="">
                        <option selected>-- Product Status --</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-check mb-0">
                      <input class="form-check-input" type="checkbox" value="" id="" />
                      <label class="form-check-label " for="" style="font-size: 0.9rem;">Featured Product</label>
                    </div>
                  </div>
                  <div class="col d-flex justify-content-end">
                    <div class="form-check mb-0">
                      <input class="form-check-input" type="checkbox" value="" id="" />
                      <label class="form-check-label " for="" style="font-size: 0.9rem;">Variable Product</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col d-grid">
                    <a href="index.php" class="btn btn-secondary btn-sm rounded-pill py-1">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">Previous</span>
                    </a>
                  </div>
                  <div class="col d-grid">
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill py-1">
                      <i class="fas fa-plus"></i>
                      <span class="ps-1">Create New</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow my-4">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Tags Manager</h5>
              </div>
              <div class="card-body">
                <div class="input-group input-group-sm">
                  <input type="text" name="" class="form-control" id="" placeholder="Product Tags" />
                </div>
              </div>
            </div>
            <div class="card shadow my-4">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Gallery</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-3 h-100">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <samll>PNG, WEBP, JPG or JPEG</samll><br />
                          <small>(MAX. UPLOAD SIZE 2MB)</small>
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
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Gallery</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-4">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-2 h-100">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-0 text-dark text-center"><small>Upload</small></h6>
                      </div>
                      <input type="file" name="file" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col-4">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                  <div class="col-4">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                  <div class="col-4">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                  <div class="col-4">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                  <div class="col-4">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
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