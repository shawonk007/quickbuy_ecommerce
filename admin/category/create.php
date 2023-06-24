<?php

require __DIR__ . '../../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Database;
use App\Class\Category;
$db = new Database();
$categories = new Category($db->conn);

$pageName = "Add New Category";
$pageGroup = "Category & Product";
$currentGroup = ["Category", "category/index.php"];
$currentPage = "Create";
require __DIR__ . '/../../components/header/tertiary.php';

function logError($errorMessage) {
  global $pageName;
  $logFile = __DIR__ . '/errors.log'; // Specify the log file name and path
  $logMessage = '['. date('Y-m-d H:i:s A') . ']' . ' | ' . 'ERROR from ' . $pageName . $errorMessage . PHP_EOL ;
  file_put_contents($logFile, $logMessage, FILE_APPEND);
  logError($logMessage); // Call the logError function recursively
}
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid d-flex align-items-center justify-content-center my-5">
      <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
        <form action="<?= config("app.root") ?>src/actions/category/store.php" method="post">
          <div class="card shadow">
            <div class="card-header bg-primary pb-0">
              <h4 class="card-title text-light">Create New Category</h4>
            </div>
            <div class="card-body">
              <div class="input-group input-group-sm mb-3">
                <input type="text" name="title" class="form-control" id="" placeholder="Category Title" required />
              </div>
              <div class="input-group input-group-sm my-3">
                <textarea name="description" class="form-control" id="" cols="30" rows="8" placeholder="Type category details here ..."></textarea>
              </div>
              <div class="input-group input-group-sm mb-3">
                <input type="text" name="slug" class="form-control" id="" placeholder="Category Slug" required />
              </div>
              <div class="row g-3 mb-3">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                  <div class="input-group input-group-sm">
                    <select name="parent" class="form-control" id="" >
                      <option value="">-- Main Category --</option>
                      <?php
                        $mainCat = $categories->index();
                        foreach ($mainCat as $main) {
                          if ($main['cat_status'] == 1 && $main['parent_id'] == ',') {  ?>
                            <option value="<?= $main['cat_id'] ?>"><?= $main['cat_title'] ?></option>
                          <?php }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                  <div class="input-group input-group-sm">
                    <select name="sub-parent" class="form-control" id="">
                      <option value="">-- Sub Category --</option>
                      <?php
                        $subCat = $categories->index();
                        foreach ($subCat as $sub) {
                          if ($sub['cat_status'] == 1 && $sub['parent_id'] > 0) {  ?>
                            <option value="<?= $sub['cat_id'] ?>"><?= $sub['cat_title'] ?></option>
                          <?php }
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row g-3 d-flex align-items-center">
                <div class="col-7">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mark" value="1" id="" />
                    <label class="form-check-label " for="" style="font-size: 0.9rem;">Mark as Featured Category</label>
                  </div>
                </div>
                <div class="col-5">
                  <div class="input-group input-group-sm">
                    <select name="status" class="form-control" id="">
                      <option value="">-- Choose Status --</option>
                      <option value="1">Enable</option>
                      <option value="0">Disable</option>
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
  <script>
    $(document).ready(function() {
      $('form').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: '<?= config("app.root") ?>src/actions/category/store.php',
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'JSON',
          success: function(response) {
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
</body>
</html>