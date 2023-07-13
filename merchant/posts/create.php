<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

// Auth::initialize();

// if (!isset($_SESSION['login'])) {
//   if (!Auth::check() || !Auth::isAdmin()) {
//     header("Location: ../../auth/login.php");
//     exit();
//   }
// }

$db = new Database();

$pageName = "Add New Post";
$pageGroup = "Blog Posts";
$currentGroup = ["Posts", "posts/index.php"];
$currentPage = "Create";

require __DIR__ . '/../../components/header.php';
?>
<style>
  .note-toolbar button, .note-toolbar select {
    font-size: 10px;
  }
</style>
<body>
  <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/secondary.php' ?>
    <section class="container-fluid my-5">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row g-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Article Overview</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12">
                    <input type="text" name="title" class="form-control form-control-sm" id="title" placeholder="Article Title" required />
                  </div>
                  <div class="col-12">
                    <textarea name="description" id="description" placeholder="Type product description here ..." required ></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Article Informations</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12">
                    <select name="main" class="select2 select2-bootstrap-5-theme w-100" id="mainCat" required >
                      <option value="">-- Main Category --</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <select name="sub" class="select2 select2-bootstrap-5-theme w-100" id="subCat" >
                      <option value="">-- Sub Category --</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <input type="text" name="slug" class="form-control form-control-sm" id="slug" placeholder="Article Slug" required />
                  </div>
                  <div class="col-12">
                    <select name="status" class="form-control form-control-sm" id="status" >
                      <option value="">-- Status --</option>
                      <option value="1">Publish</option>
                      <option value="0">Disable</option>
                      <option value="">Draft</option>
                    </select>
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
            <div class="card shadow my-3">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Article Tags</h5>
              </div>
              <div class="card-body">
                <select name="" class="select2 select2-bootstrap-5-theme w-100" id="postTags" multiple >
                  <!-- <option value="">-- Article Tags --</option> -->
                </select>
              </div>
            </div>
            <div class="card shadow">
              <div class="card-header bg-primary py-1">
                <h5 class="card-title text-light font-bold py-0 my-0">Article Thumbnail</h5>
              </div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12">
                    <input type="file" class="form-control form-control-sm" id="imageInput" />
                  </div>
                  <div class="col-12">
                    <img id="dummy" src="../../assets/images/dummy-square.jpg" class="w-100" alt="" style="aspect-ratio: 2/1;" />
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
      $('#mainCat, #subCat, #postTags').select2({
        theme: 'bootstrap-5'
      });
      $('.select2-container .select2-selection--single').css({
        'padding': '5px 10px',
        'font-size': '12px'
      });
      $('#description').summernote({
        height: 540,
        width: '100%',
        placeholder: 'Type post destails here ...',
      });
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