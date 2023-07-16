<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Auth;
use App\Database;
$db = new Database();

$name = $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'];

$pageName = "Notifications < {$name}";
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

            <body>
                <table class="table">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>name of user</th>
                            <th>Desciption</th>
                            <th>Time</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><img src="https://via.placeholder.com/50x50" alt="" class="rounded-circle"></td>
                            <td>
                                <div class="my-3">
                                    Nasir
                                </div>
                            </td>
                            <td>
                                <div class="my-3">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>

                            </td>
                            <td>
                                <div class="my-3">
                                    2 minutes ago
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </section>
    </main>
</body>

</html>