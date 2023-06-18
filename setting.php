<?php
$pageName = "Setting";
$pageGroup = "User Profile";
$currentPage = "Setting";
require __DIR__ . '/components/header/primary.php';
require __DIR__ . '/vendor/autoload.php';
?>

<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content">
    <!-- BREADCRUM -->
    <?php require_once "./includes/breadcrum.php" ?>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <div class="container d-flex align-items-center justify-content-center">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form action="" method="post">
              <div class="my-2">
                <div class="mb-3 row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Currenat Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword">

                  </div>

                </div>

                <div class="mb-3 row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">New Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword">

                  </div>

                </div>

                <div class="mb-3 row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Retype Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword">

                  </div>

                </div>

                <div class="mb-3 row">
                  <label for="inputPassword" class="col-sm-4 col-form-label"></label>
                  <div class="col-sm-8 d-grid">
                    <button type="submit" class="btn btn-primary">change</button>

                  </div>

                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>