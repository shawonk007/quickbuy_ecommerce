<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$pageName = "About";
require_once "./includes/header.php";
require __DIR__ . '/vendor/autoload.php';
?>
<body>
  <?php require __DIR__ . '/components/navbar/primary.php' ?>
  <?php require __DIR__ . '/components/navbar/below.php' ?>
  <main>
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/components/navigation/scroll-to-top.php' ?>
    <section class="py-5 my-5"></section>
  </main>
  <?php require __DIR__ . '/components/footer/footer-widgets.php' ?>
  <?php require __DIR__ . '/components/footer/footer-bar.php' ?>
</body>
</html>