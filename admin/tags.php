<?php
require __DIR__ . '/../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;
$db = new Database();
$pageName = "Manage Tags";
$pageGroup = "Tags Manager";
$currentPage = "Tags";

// if (Auth::check() === false && Auth::isAdmin() === false) {
//   header("Location: login.php");
// }

$root = config("app.admin");
require __DIR__ . '/../components/header.php';

?>
<style>
  @import url("https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css");
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap-world-mill.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css"> -->
<body class="scrollable-content">
  <?php require __DIR__ . "/../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../components/breadcrumb/admin/primary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5"></section>
  </main>
</body>
</html>