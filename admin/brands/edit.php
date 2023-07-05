<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Edit Brand";
$pageGroup = "Brands & Manufacturer";
$currentGroup = ["Brands", "brands/index.php"];
$currentPage = "Edit";
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
      <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
        <form action="<?= config("app.root")?>src/actions/brands/store.php" method="post" enctype="multipart/form-data" id="createBrand" >
          <div class="card shadow">
            <div class="card-header bg-success py-1">
              <h4 class="card-title text-light py-0 my-0">Update Brand</h4>
            </div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-6">
                  <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light h-100" style="border: 3px solid lightgray; border-style: dashed;">
                    <div class="d-flex flex-column align-items-center justify-content-center py-3 h-100">
                      <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                      <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                      <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                        <span>PNG, WEBP, JPG or JPEG</span><br />
                        <span>(MAX. UPLOAD SIZE 2MB)</span><br />
                        <span>(MIN. RESOLUTION 300X300)</span>
                      </p>
                    </div>
                    <input type="file" name="logo" class="d-none" id="imageInput" />
                  </label>
                </div>
                <div class="col-6">
                  <img src="../../assets/images/dummy-square.jpg" class="w-100" alt="" id="dummy" />
                </div>
                <div class="col-12">
                  <input type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Brand Title"  required />
                </div>
                <div class="col-12">
                  <textarea name="desc" class="form-control form-control-sm" id="desc" cols="30" rows="8"></textarea>
                </div>
                <div class="col-12">
                <input type="text" name="slug" class="form-control form-control-sm" id="slug" placeholder="Brand Slug" />
                </div>
                <div class="col-6 d-flex align-items-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mark" value="1" id="mark" />
                    <label class="form-check-label " for="mark" style="font-size: 0.9rem;">Mark as Featured</label>
                  </div>
                </div>
                <div class="col-6">
                  <select name="status" class="form-control form-control-sm" id="status">
                    <option value="">-- Choose Status --</option>
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                  </select>
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
                  <button type="submit" class="btn btn-success rounded-pill">
                    <i class="fas fa-check"></i>
                    <span class="ps-1">Update</span>
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
      $('#createBrand').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          url: '<?= config("app.root") ?>src/actions/brands/store.php',
          type: 'POST',
          // data: $(this).serialize(),
          data: formData,
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function(response) {
            console.log(response);
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Created',
                text: response.message,
                timer: 2000,
                showConfirmButton: false
              }).then(function() {
                window.location.href = 'index.php';
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                timer: 2000,
                showConfirmButton: false
              });
            }
          },
          error: function(xhr, status, error) {
            if (xhr.status === 400) {
              // Bad request error
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Bad request. Please check your form data.',
                timer: 2000,
                showConfirmButton: false
              });
            } else if (xhr.status === 500) {
              // Internal server error
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Internal server error. Please try again later.',
                timer: 2000,
                showConfirmButton: false
              });
            } else {
              // Other errors
              console.error(error);
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while processing the request.',
                timer: 2000,
                showConfirmButton: false
              });
            }
          }
        });
      });
    });
  </script>
  <script>
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