<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;
$db = new Database();

// Auth::initialize();

// if (!isset($_SESSION['login'])) {
//   if (!Auth::check() || !Auth::isCustomer()) {
//     header("Location: auth/login.php");
//     exit();
//   }
// }

$name = $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'];

$pageName = "Feedback < {$name}";
$pageGroup = "Dashboard";
$currentPage = "Dashoboard";
require __DIR__ . '/components/header.php';
?>
<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content" class="bg-body-tertiary" >
    <?php require __DIR__ . "/components/navbar/customer.php" ?>
    <?php require __DIR__ . "/components/breadcrumb/customer/primary.php" ?>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="container-fluid my-5">
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