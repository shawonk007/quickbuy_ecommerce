<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Sample";
require __DIR__ . '/components/header.php';
?>
<body>
  <main id="content">
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="container-fluid py-5"></section>
  </main>
</body>
</html>