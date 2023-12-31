<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;
use App\Class\Category;

$db = new Database();
$categories = new Category($db->conn);

$pageName = "Add New Product";
$pageGroup = "Product Catalogue";
$currentGroup = ["Products", "products/index.php"];
$currentPage = "Create";

require __DIR__ . '/../../components/header.php';
?>
<style>
  .note-toolbar button, .note-toolbar select {
    font-size: 10px;
  }
</style>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5">
      <form action="<?= config("app.root") ?>src/actions/products/store.php" method="post" enctype="multipart/form-data">
        <div class="row g-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Overview</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12">
                    <input type="text" name="title" class="form-control form-control-sm" id="" placeholder="Product Title" />
                  </div>
                  <div class="col-12">
                    <textarea name="highlights" id="highlights" placeholder="Type product highlights here ..."></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow my-3">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Details</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <select name="main_category" class="select2 select2-bootstrap-5-theme w-100" id="mainCat" >
                      <option value="">-- Main Category --</option>
                      <?php $mainCat = $categories->index();
                      foreach ($mainCat as $main) {
                        if ($main['cat_status'] == 1 && $main['parent_id'] == 0) {  ?>
                        <option value="<?= $main['cat_id'] ?>"><?= $main['cat_title'] ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <select name="sub_category" class="select2 select2-bootstrap-5-theme w-100" id="subCat">
                      <option value="">-- Sub Category --</option>
                    </select>
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <select name="product_type" class="select2 select2-bootstrap-5-theme w-100" id="productType">
                      <option value="">-- Product Type --</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active py-1" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link py-1" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications-tab-pane" type="button" role="tab" aria-controls="specifications-tab-pane" aria-selected="false">Specifications</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link py-1" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional-tab-pane" type="button" role="tab" aria-controls="additional-tab-pane" aria-selected="false">Additional</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                      <textarea name="description" id="description" placeholder="Type product description here ..."></textarea>
                    </div>
                    <div class="tab-pane fade" id="specifications-tab-pane" role="tabpanel" aria-labelledby="specifications-tab" tabindex="0">
                      <textarea name="specifications" id="specifications" placeholder="Type product specifications here ..."></textarea>
                    </div>
                    <div class="tab-pane fade" id="additional-tab-pane" role="tabpanel" aria-labelledby="additional-tab" tabindex="0">
                      <textarea name="additional" id="additional" placeholder="Type product additional here ..."></textarea>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow my-3">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Option</h5>
              </div>
              <div class="card-body ">
                <div class="card mb-3" id="option" >
                  <div class="card-header bg-white">
                    <div class="row row-cols-3 g-3">
                      <div class="col-3 d-flex align-items-center">
                        <strong>Option Name</strong>
                      </div>
                      <div class="col-5 ">
                        <input type="text" name="o_name[]" class="form-control form-control-sm pe-0 me-0" id="length" placeholder="Enter Name" />
                      </div>
                      <div class="col-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm ms-1 me-1" id="new" >
                          <i class="fas fa-plus"></i>
                          <span class="ps-1">Add New</span>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm ms-1 me-0" id="delete" >
                          <i class="fas fa-trash-alt"></i>
                          <span class="ps-1">Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0 pb-2 my-0">
                    <div class="row g-3 py-1 mt-0 mb-1" id="optionSet" >
                      <div class="col-3">
                        <input type="text" name="o_type[]" class="form-control form-control-sm" id="length" placeholder="Option Type" />
                      </div>
                      <div class="col-7">
                        <input type="text" name="o_value[]" class="form-control form-control-sm" id="length" placeholder="Option Value" />
                      </div>
                      <div class="col-2 d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary btn-sm ms-1 me-1" id="add" >
                          <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm ms-1 me-0" id="remove" >
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
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
                    <input type="text" name="sku" class="form-control form-control-sm" id="sku" placeholder="Product SKU" />
                  </div>
                  <div class="input-group input-group-sm">
                    <input type="text" name="slug" class="form-control form-control-sm" id="slug" placeholder="Product Slug" />
                  </div>
                </div>
                <div class="row g-3 mt-0 mb-3">
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="r_price" class="form-control form-control-sm" id="rPrice" placeholder="Regular Price" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <input type="text" name="o_price" class="form-control form-control-sm" id="oPrice" placeholder="Offer Price" />
                    </div>
                  </div>
                </div>
                <div class="input-group input-group-sm">
                  <select name="merchant" class="form-control" id="storeName">
                    <option value="">-- Store Name --</option>
                  </select>
                </div>
                <div class="row g-3 mt-0 mb-2">
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <select name="s_status" class="form-control form-control-sm" id="sStatus">
                        <option value="">-- Availability --</option>
                        <option value="1">In Stock</option>
                        <option value="2">Exclusive</option>
                        <option value="3">Limited</option>
                        <option value="0">Stock Out</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="input-group input-group-sm">
                      <input type="number" name="quantity" class="form-control" id="qty" placeholder="Stock Quantity" />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-group input-group-sm">
                      <select name="brand" class="form-control" id="brandName" >
                        <option value="">-- Brand Name --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check mt-1 mb-0">
                      <input class="form-check-input" type="checkbox" value="1" id="featured" />
                      <label class="form-check-label " for="featured" style="font-size: 0.9rem;">Featured</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-check mt-1 mb-0">
                      <input class="form-check-input" type="checkbox" value="1" id="variable" />
                      <label class="form-check-label " for="variable" style="font-size: 0.9rem;">Variable</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="input-group input-group-sm">
                      <select name="status" class="form-control" id="">
                        <option value="">-- Status --</option>
                        <option value="1">Publish</option>
                        <option value="0">Disable</option>
                        <option value="">Draft</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col d-grid">
                    <a href="index.php" class="btn btn-secondary btn-sm rounded-pill py-1">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">Discard</span>
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
            <div class="card shadow my-3">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Tags Manager</h5>
              </div>
              <div class="card-body">
                <select name="product_tag" class="select2 select2-bootstrap-5-theme w-100" id="productTags" multiple >
                  <!-- <option value="">-- Article Tags --</option> -->
                </select>
              </div>
            </div>
            <div class="card shadow my-3">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Thumbnail</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light h-100" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <samll>PNG, JPG or JPEG</samll><br />
                          <small>(MAX. UPLOAD SIZE 2MB)</small>
                        </p>
                      </div>
                      <input type="file" name="thumbnail" class="d-none" id="imageInput" accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col position-relative">
                    <img id="dummy" src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="right: 0.5rem;">
                      <i class="fas fa-close"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow my-3">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Gallery</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-4">
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light h-100" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-2">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-0 text-dark text-center"><small>Upload</small></h6>
                      </div>
                      <input type="file" name="gallery[]" class="d-none" id="imageInput" accept="image/*;capture=camera" multiple />
                    </label>
                  </div>
                  <div class="col-4 position-relative">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="right: 0.5rem;">
                      <i class="fas fa-close"></i>
                    </button>
                  </div>
                  <div class="col-4 position-relative">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="right: 0.5rem;">
                      <i class="fas fa-close"></i>
                    </button>
                  </div>
                  <div class="col-4 position-relative">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="right: 0.5rem;">
                      <i class="fas fa-close"></i>
                    </button>
                  </div>
                  <div class="col-4 position-relative">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="right: 0.5rem;">
                      <i class="fas fa-close"></i>
                    </button>
                  </div>
                  <div class="col-4 position-relative">
                    <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="right: 0.5rem;">
                      <i class="fas fa-close"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow my-3">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Product Shipment</h5>
              </div>
              <div class="card-body">
                <div class="row row-cols-3 g-3">
                  <div class="col-6">
                    <input type="text" name="weight" class="form-control form-control-sm" id="weight" placeholder="Weight (kg.)" />
                  </div>
                  <div class="col-6">
                    <input type="text" name="length" class="form-control form-control-sm" id="length" placeholder="Length (cm.)" />
                  </div>
                  <div class="col-6">
                    <input type="text" name="width" class="form-control form-control-sm" id="width" placeholder="Width (cm.)" />
                  </div>
                  <div class="col-6">
                    <input type="text" name="height" class="form-control form-control-sm" id="height" placeholder="Height (cm.)" />
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
    $(document).ready(function() {
      $('#mainCat, #subCat, #productType, #brandName, #storeName, #productTags').select2({
        theme: 'bootstrap-5'
      });
      $('.select2-container .select2-selection--single').css({
        'padding': '5px 10px',
        'font-size': '12px'
      });

      $('#mainCat').change(function() {
        var mainCatId = $(this).val();
        if (mainCatId !== '') {
          var subCats = <?= json_encode($categories->index()); ?>;
          var subCatOptions = '<option value="">-- Sub Category --</option>';
          subCats.forEach(function(subCat) {
            if (subCat.cat_status == 1 && subCat.parent_id == mainCatId) {
              subCatOptions += '<option value="' + subCat.cat_id + '">' + subCat.cat_title + '</option>';
            }
          });
          $('#subCat').html(subCatOptions);
        } else {
          $('#subCat').html('<option value="">-- Sub Category --</option>');
        }
      });

      $('#subCat').change(function() {
        var subCatId = $(this).val();
        if (subCatId !== '') {
          var productTypes = <?= json_encode($categories->index()); ?>;
          var productTypeOptions = '<option value="">-- Product Type --</option>';
          productTypes.forEach(function(productType) {
            if (productType.cat_status == 1 && productType.parent_id == subCatId) {
              productTypeOptions += '<option value="' + productType.cat_id + '">' + productType.cat_title + '</option>';
            }
          });
          $('#productType').html(productTypeOptions);
        } else {
          $('#productType').html('<option value="">-- Product Type --</option>');
        }
      });

      $('#description, #specifications, #additional').summernote({
        height: 450,
        width: '100%',
        placeholder: 'Type product destails here ...',
      });

      $('#highlights').summernote({
        height: 200,
        width: '100%',
        placeholder: 'Type product highlights here ...',
      });

      $(document).on("click", "#new", function() {
        var option = $("#option");
        var newOption = option.clone(true);
        option.parent().append(newOption);
      });

      $(document).on("click", "#add", function() {
        var optionSet = $("#optionSet");
        var newOptionSet = optionSet.clone(true);
        optionSet.parent().append(newOptionSet);
      });

      // $('form').submit(function(e) {
      //   e.preventDefault();
      //   $.ajax({
      //     url: '<?= config("app.root") ?>src/actions/products/store.php',
      //     type: 'POST',
      //     data: $(this).serialize(),
      //     dataType: 'json',
      //     success: function(response) {
      //       console.log(response);
      //       if (response.success) {
      //         Swal.fire({
      //           icon: 'success',
      //           title: 'Created',
      //           text: response.message,
      //           timer: 2000,
      //           showConfirmButton: false
      //         }).then(function() {
      //           window.location.href = 'index.php';
      //         });
      //       } else {
      //         Swal.fire({
      //           icon: 'error',
      //           title: 'Error',
      //           text: response.message,
      //           timer: 2000,
      //           showConfirmButton: false
      //         });
      //       }
      //     },
      //     error: function(xhr, status, error) {
      //       if (xhr.status === 400) {
      //         // Bad request error
      //         Swal.fire({
      //           icon: 'error',
      //           title: 'Error',
      //           text: 'Bad request. Please check your form data.',
      //           timer: 2000,
      //           showConfirmButton: false
      //         });
      //       } else if (xhr.status === 500) {
      //         // Internal server error
      //         Swal.fire({
      //           icon: 'error',
      //           title: 'Error',
      //           text: 'Internal server error. Please try again later.',
      //           timer: 2000,
      //           showConfirmButton: false
      //         });
      //       } else {
      //         // Other errors
      //         console.error(error);
      //         Swal.fire({
      //           icon: 'error',
      //           title: 'Error',
      //           text: 'An error occurred while processing the request.',
      //           timer: 2000,
      //           showConfirmButton: false
      //         });
      //       }
      //     }
      //   });
      // });
    });
    var imgInp = document.getElementById("imageInput");
    var dummy = document.getElementById("dummy");
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        dummy.src = URL.createObjectURL(file)
      }
    }
  </script>
</body>
</html>