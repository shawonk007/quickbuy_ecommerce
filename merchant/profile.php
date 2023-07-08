<?php
require __DIR__ . '/../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "Profile";
$pageGroup = "Profile";
$currentGroup = ["Marchent", "users/profile.php"];
$currentPage = "Profile";
require __DIR__ . '/../components/header.php';
// require_once "../connection.php";
?>

<head>
  <style>
    .profile-cover{
        object-fit: cover;
    }
    .profile-img{
        margin-top: -115px;
    }
  </style>
</head>
<body>
  <?php require __DIR__ . "/../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../components/breadcrumb/merchant/primary.php' ?>
    <section class="m-3">
    <div class="content container-fluid">
      <div class="row justify-content-lg-center">
        <div class="col-lg-10">
          <!-- Profile Cover -->
          <div class=" ">
            <div class="profile-cover">
              <img class="w-100 rounded" src="https://picsum.photos/id/726/820/312" width="150px" height="220px" alt="Image Description">
            </div>
          </div>
          <!-- End Profile Cover -->
          <!-- Avatar -->
          <div class="profile-img text-center">
            <img class="avatar-img z-2 position-relative border border-5 border-light rounded-circle" src="https://i.pravatar.cc/151" width="150px" alt="Image Description">
          </div>
          <!-- End Avatar -->

          <!-- Profile Header -->
          <div class="text-center mb-5">
            <span class="fw-bold h2 ">Eita Loura </span><i class="py-3 fa-solid fa-circle-check text-success"></i>
            <!-- List -->
            <ul class="list-inline fw-bold mt-3">
              <li class="list-inline-item">
                <i class="fas fa-building me-1"></i>
                <span>New York City</span>
              </li>

              <li class="list-inline-item">
              <i class="fas fa-location-dot me-1"></i>
                <span href="#">San Francisco, USA</span>
              </li>

              <li class="list-inline-item">
                <i class="fas fa-calendar-week me-1"></i>
                <span>Joined March 2017</span>
              </li>
            </ul>
            <!-- End List -->
          </div>
          <!-- End Profile Header -->

          <!-- Nav -->
          <div class="mb-5">
            <ul class="nav nav-tabs align-items-center text-dark">
              <li class="nav-item">
                <a class="nav-link active" href="">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href=".">shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="">Review</a>
              </li>
              <li class="nav-item ms-auto">
                <div class="d-flex gap-2">
                    <div class="input-group">
                        <input class="form-control border-end-0 border rounded-start" type="search" placeholder="search" id="example-search-input">
                        <span class="">
                            <button class="btn btn-outline-secondary border border-bottom-0 rounded-end" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>  
                </div>
              </li>
            </ul>
          </div>
          <!-- End Nav -->

          <div class="row">
            <div class="col-lg-4">
              <!-- Card -->
              <div class="card card-body mb-3 mb-lg-5">
                <h5>Complete your profile</h5>
                <!-- Progress -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="progress flex-grow-1">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 32%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="ms-2">32%</span>
                </div>
                <!-- End Progress -->
              </div>
              <!-- End Card -->

              <!-- Card -->
              <div class="card mb-1 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                  <h4 class="card-header-title">Profile</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                  <ul class="list-unstyled text-dark mb-0">
                    <li class="pb-0"><span class="fw-bold">About</span></li>
                    <li><i class="bi-person dropdown-item-icon"></i> Ella Lauda</li>
                    <li><i class="bi-briefcase dropdown-item-icon"></i> No department</li>
                    <li><i class="bi-building dropdown-item-icon"></i> Htmlstream</li>

                    <li class="pt-4 pb-0"><span class="fw-bold">Contacts</span></li>
                    <li><i class="bi-at dropdown-item-icon"></i> ella@site.com</li>
                    <li><i class="bi-phone dropdown-item-icon"></i> +1 (609) 972-22-22</li>
                  </ul>
                </div>
                <!-- End Body -->
              </div>
              <!-- End Card -->
            </div>

            <div class="col-lg-8">
              <div class="d-grid gap-3 gap-lg-5">
                <!-- Card -->
                <div class="card">
                  <!-- Header -->
                  <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Activity stream</h4>
                  </div>
                  <!-- End Header -->

                  <!-- Body -->
                  <div class="card-body">

                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <div class="card-footer">

                  </div>
                  <!-- End Footer -->
                </div>
                <!-- End Card -->
            </div>
          </div>
          <!-- End Row -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    </section>
  </main>
</body>
</html>