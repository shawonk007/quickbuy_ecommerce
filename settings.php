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

$pageName = "Settings < {$name}";
$pageGroup = "Security & Settings";
$currentPage = "Settings";
require __DIR__ . '/components/header.php';
?>
<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content" class="bg-body-tertiary" >
    <?php require __DIR__ . "/components/navbar/customer.php" ?>
    <?php require __DIR__ . "/components/breadcrumb/customer/primary.php" ?>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <!-- <section class="container-fluid my-5">
    </section> -->
    <section class="container-fluid d-flex align-items-start my-5">
      <div class="nav flex-column nav-pills bg-white shadow ps-2 pe-2 py-2 me-2 me-lg-3 vh-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link ps-lg-5 pe-lg-5 active" id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general" aria-selected="true">General</button>
        <button class="nav-link ps-lg-5 pe-lg-5" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
        <button class="nav-link ps-lg-5 pe-lg-5" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false" disabled>Disabled</button>
        <button class="nav-link ps-lg-5 pe-lg-5" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
        <button class="nav-link ps-lg-5 pe-lg-5" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
      </div>
      <div class="tab-content w-100" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab" tabindex="0">
          <div class="card shadow border-0 vh-100">
            <div class="card-header bg-primary py-1">
              <h4 class="card-title text-white py-0 my-0">Change Password</h4>
            </div>
            <div class="card-body d-flex justify-content-center py-5">
              <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 col-xxl-6">
                <form action="" method="post">
                <div class="row g-3">
                  <div class="col-5 d-flex align-items-center">
                    <label for="old">
                      <small class="py-0 m-0"><b>Old Password</b></small>
                    </label>
                  </div>
                  <div class="col-7">
                    <input type="password" name="o_password" class="form-control form-control-sm" id="old" placeholder="Current Password" />
                  </div>
                  <div class="col-5 d-flex align-items-center">
                    <label for="new">
                      <small class="py-0 m-0"><b>New Password</b></small>
                    </label>
                  </div>
                  <div class="col-7">
                    <input type="password" name="n_password" class="form-control form-control-sm" id="new" placeholder="New Password" />
                  </div>
                  <div class="col-5 d-flex align-items-center">
                    <label for="confirm">
                      <small class="py-0 m-0"><b>Confirm</b></small>
                    </label>
                  </div>
                  <div class="col-7">
                    <input type="password" name="c_password" class="form-control form-control-sm" id="confirm" placeholder="Confirm Password" />
                  </div>
                  <div class="col-7 offset-5 d-grid">
                    <button type="submit" class="btn btn-success">
                      <i class="fas fa-check"></i>
                      <span class="ps-2">Update</span>
                    </button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
      </div>
    </section>
  </main>
</body>
</html>