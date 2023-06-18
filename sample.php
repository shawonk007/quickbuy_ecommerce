<?php
$pageName = "Customer Dashboard";
$pageGroup = "Dashboard";
$currentPage = "Dashboard";
require __DIR__ . '/components/header/primary.php';
require __DIR__ . '/vendor/autoload.php';
?>
<body>
<?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content">
    <!-- BREADCRUM -->
    <?php require_once "./includes/breadcrum.php" ?>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="my-5"></section>
  </main>
</body>
</html>