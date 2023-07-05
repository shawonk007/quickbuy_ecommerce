<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "My Wishlist";
require __DIR__ . '/components/header.php';
?>

<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content">
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="container-fluid py-5">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Thumbnail</th>
            <th>Description</th>
            <th>Price</th>

            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <img src="https://via.placeholder.com/100x100" alt="" />
            </td>
            <td>
              <div class="my-2">
                <h6>
                  <a href="#">White T-Shirt</a>
                </h6>
                <p class="py-0 my-0">
                  <a href="#">Men's Wear</a>
                </p>
                <p class="py-0 my-0">
                  <a href="#">Aarong</a>
                </p>
              </div>
            </td>
            <td>
              <div class="mt-4">
                <p class="py-0 my-0"><strike>$30.00</strike></p>
                <p class="py-0 my-0">$30.00</p>
              </div>
            </td>
            <td>
              <form action="" method="post" class="mt-3">
                <input type="hidden" name="" />
                <a href="#" class="btn btn-outline-primary btn-sm">
                  <i class="fas fa-eye"></i>
                </a>
                <button type="submit" class="btn btn-outline-danger btn-sm my-3">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>

    </section>
  </main>
</body>

</html>