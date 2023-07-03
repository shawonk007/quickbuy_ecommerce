<?php
require __DIR__ . '/../../vendor/autoload.php';
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
require __DIR__ . '/../../components/header.php';
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
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Category Title" required />
                </div>
                <div class="col-12">
                  <textarea name="description" class="form-control form-control-sm" id="description" cols="30" rows="8" placeholder="Type category details here ..."></textarea>
                </div>
                <div class="col-12">
                  <input type="text" name="slug" class="form-control form-control-sm" id="slug" placeholder="Category Slug" />
                </div>
                <div class="col-6">
                  <select name="parent" class="select2 select2-bootstrap-5-theme w-100" id="mainCat" >
                    <option value="">-- Main Category --</option>
                    <?php $mainCat = $categories->index();
                    foreach ($mainCat as $main) {
                      if ($main['cat_status'] == 1 && $main['parent_id'] == NULL) {  ?>
                      <option value="<?= $main['cat_id'] ?>"><?= $main['cat_title'] ?></option>
                    <?php } } ?>
                  </select>
                </div>
                <div class="col-6">
                  <select name="sub-parent" class="select2 select2-bootstrap-5-theme w-100" id="subCat">
                    <option value="">-- Sub Category --</option>
                    <?php $subCat = $categories->index();
                    $parent = $main['cat_id'];
                    foreach ($subCat as $sub) {
                      if (Category::check($sub['parent_id'], $db)) { ?>
                      <option value="<?= $sub['cat_id'] ?>"><?= $sub['cat_title'] ?></option>
                    <?php } } ?>
                  </select>
                </div>
                <div class="col-6 d-flex align-items-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mark" value="1" id="mark" />
                    <label class="form-check-label " for="" style="font-size: 0.9rem;">Mark as Featured Category</label>
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
      $('#mainCat').add('#subCat').select2({
        theme: 'bootstrap-5'
      });
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