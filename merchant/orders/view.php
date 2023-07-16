<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();

$pageName = "Manage Categories";
$pageGroup = "Category & Product";
$currentGroup = ["Category", "category/index.php"];
$currentPage = "Index";
require __DIR__ . '/../../components/header.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/secondary.php' ?>
    <section class="container-fluid my-5">
      <div class="row g-3 g-lg-5">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xl-6 col-xxl-6">
          <div class="card">
            <div class="card-header pb-0"></div>
            <div class="card-body"></div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xl-6 col-xxl-6">
          <div class="card">
            <div class="card-header pb-0"></div>
            <div class="card-body"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid my-5">
      <div class="card">
        <div class="card-body"></div>
      </div>
    </section>
    <a href="javascript:void(0)">
      <i class="fas fa-user"></i>
      <span class="ps-1 d-none d-md-inline">Profile</span>
    </a>
  </main>
</body>
</html>