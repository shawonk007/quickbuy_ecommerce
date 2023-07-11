<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

Auth::initialize();

if (!isset($_SESSION['login'])) {
  if (!Auth::check() || !Auth::isAdmin()) {
    header("Location: ../../auth/login.php");
    exit();
  }
}

$db = new Database();

$pageName = "Store";
$pageGroup = "Store";
$currentGroup = ["Marchent", "users/store.php"];
$currentPage = "Store";

require __DIR__ . '/../../components/header.php';
?>

<body>
  <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
    <section class="mx-4">
      <div class="row mt-4">
        <!-- Top Selling Product Start -->
        <div class="col-lg-6 mb-3">
          <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
              <div>
                <h5 class="my-2">Top Selling Products</h5>
              </div>
              <div class="right">
                <select class="form-select px-3 me-1">
                  <option value="">Yearly</option>
                  <option value="">Monthly</option>
                  <option value="">Weekly</option>
                </select>
              </div>
            </div>

            <!-- End Title -->
            <div class="table-responsive card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6 class="">Products</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Category</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Price</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Sold</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Profit</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/150" width="45px" />
                        </div>
                        <p class="">Chair lorem</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Interior</p>
                    </td>
                    <td>
                      <p class="">$345</p>
                    </td>
                    <td>
                      <p class="">43</p>
                    </td>
                    <td>
                      <p class="">$45</p>
                    </td>
                  </tr>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/230" width="45px" />
                        </div>
                        <p class="">T-Shirt </p>
                      </div>
                    </td>
                    <td>
                      <p class="">Cloth</p>
                    </td>
                    <td>
                      <p class="">$53</p>
                    </td>
                    <td>
                      <p class="">1234</p>
                    </td>
                    <td>
                      <p class="">$115</p>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table -->
            </div>
          </div>
        </div>
        <!-- End Col -->
        <!-- Top Selling Product End-->

        <!-- Sales History Start -->
        <div class="col-lg-6 mb-3">
          <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
              <div>
                <h5 class="my-2">Latest Orders</h5>
              </div>
              <div class="right">
                <select class="form-select px-3 me-1">
                  <option value="">Today</option>
                  <option value="">Weekly</option>
                  <option value="">Monthly</option>
                  <option value="">Yearly</option>
                </select>
              </div>
            </div>
            <!-- End Title -->
            <div class="table-responsive card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6 class="">Products</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Category</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Amount</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Status</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Actions</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/260" width="45px" />
                        </div>
                        <p class="">Table</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Interior</p>
                    </td>
                    <td>
                      <p class="">$56</p>
                    </td>
                    <td>
                      <span class="badge text-bg-warning p-2">Pending</span>
                    </td>
                    <td class="text-center text-dark">
                      <a href="#" class="text-dark"><i class="fa-solid fa-pen"></i></a>
                    </td>
                  </tr>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/280" width="45px" />
                        </div>
                        <p class="">Pant</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Cloth</p>
                    </td>
                    <td>
                      <p class="">$69</p>
                    </td>
                    <td>
                      <span class="badge text-bg-success p-2">Completed</span>
                    </td>
                    <td class="text-center">
                      <a href="#" class="text-dark"><i class="fa-solid fa-pen"></i></a>
                    </td>
                  </tr>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/270" width="45px" />
                        </div>
                        <p class="">Smartphone</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Electronics</p>
                    </td>
                    <td>
                      <p class="">$147</p>
                    </td>
                    <td>
                      <span class="badge text-bg-danger p-2">Cancel</span>
                    </td>
                    <td class="text-center">
                      <a href="#" class="text-dark"><i class="fa-solid fa-pen"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table -->
            </div>
          </div>
        </div>
        <!-- End Col -->
        <!-- Sales History End-->
      </div>
      
      <div class="row mt-4">
        <!-- Top Selling Product Start -->
        <div class="col-lg-6 mb-3">
          <div class="card">
            <div class="card-header text-center">
              <div>
                <h5 class="my-2 ">Sales Historys</h5>
              </div>
            </div>

            <!-- End Title -->
            <div class="table-responsive card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6 class="">Products</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Category</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Amount</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Status</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/260" width="45px" />
                        </div>
                        <p class="">Table</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Interior</p>
                    </td>
                    <td>
                      <p class="">$56</p>
                    </td>
                    <td>
                      <span class="badge text-bg-warning p-2">Pending</span>
                    </td>
                  </tr>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/280" width="45px" />
                        </div>
                        <p class="">Pant</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Cloth</p>
                    </td>
                    <td>
                      <p class="">$69</p>
                    </td>
                    <td>
                      <span class="badge text-bg-success p-2">Completed</span>
                    </td>
                  </tr>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/272" width="45px" />
                        </div>
                        <p class="">Face Wash</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Fasion</p>
                    </td>
                    <td>
                      <p class="">$75</p>
                    </td>
                    <td>
                      <span class="badge text-bg-success p-2">Completed</span>
                    </td>
                  </tr>
                  
                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <div class="me-2 ">
                          <img class="rounded-3" src="https://i.pravatar.cc/270" width="45px" />
                        </div>
                        <p class="">Smartphone</p>
                      </div>
                    </td>
                    <td>
                      <p class="">Electronics</p>
                    </td>
                    <td>
                      <p class="">$147</p>
                    </td>
                    <td>
                      <span class="badge text-bg-danger p-2">Cancel</span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table -->
            </div>
          </div>
        </div>
        <!-- End Col -->
        <!-- Top Selling Product End-->

        <!-- Sales History Start -->
        <div class="col-lg-6 mb-3">
          <div class="card">
            <div class="card-header text-center bg-light">
              <div>
                <h5 class="my-2">New Subscribers</h5>
              </div>
            </div>
            <!-- End Title -->
            <div class="table-responsive card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6 class="">Subscriber's Name</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Subscription Date</h6>
                    </th>
                    <th class="min-width">
                      <h6 class="">Colum</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <tr class="">
                    <td>
                      <div class="d-flex align-items-center justify-content-left">
                        <p class="">Franquis Lays</p>
                      </div>
                    </td>
                    <td>
                        <p class=""><span id="current-date"></span>
                            <script>
                            var currentDate = new Date();
                            var day = currentDate.getDate();
                            var month = currentDate.getMonth();
                            var year = currentDate.getFullYear();
                            var formattedDate = day + " " + currentDate.toLocaleString("default", { month: "long" }) + ", " + year;
                            document.getElementById("current-date").innerHTML = formattedDate;

                            </script>
                        </p>
                    </td>
                    <td>
                      <span class=""></span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table -->
            </div>
          </div>
        </div>
        <!-- End Col -->
        <!-- Sales History End-->
      </div>
      
    </section>
  </main>
</body>

</html>