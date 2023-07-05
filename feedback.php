<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Feedback";
require __DIR__ . '/components/header.php';
?>
<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content">
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="container-fluid py-5">
    <table class="table">
        <thead>
            <tr>
                <th>image</th>
                <th>User name</th>
                <th>Desciption</th>
                <th>Time</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    </section>
  </main>
</body>
</html>