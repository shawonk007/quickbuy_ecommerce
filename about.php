<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "About";
require __DIR__ . '/components/header.php';

?>
<body>
  <?php require __DIR__ . '/components/navbar/primary.php' ?>
  <?php require __DIR__ . '/components/navbar/below.php' ?>
  <main>
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/components/navigation/scroll-to-top.php' ?>
    <section class="py-5 my-5">
      <div class="container">
        <?php
          $aboutFile = fopen("./assets/data/about.qb", "r");
          if ($aboutFile) {
            while (($paragraph = fgets($aboutFile)) !== false) { ?>
              <p class="paragraph"><?= $paragraph ?></p>
            <?php }
            fclose($aboutFile);
          } else {
            echo "Failed to open file.";
          }
        ?>
      </div>
    </section>
  </main>
  <?php require __DIR__ . '/components/footer/footer-widgets.php' ?>
  <?php require __DIR__ . '/components/footer/footer-bar.php' ?>
</body>
</html>