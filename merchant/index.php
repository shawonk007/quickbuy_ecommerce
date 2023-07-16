<?php
require __DIR__ . '/../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();

$pageName = "Dashboard";
$pageGroup = "Dashboard";
$currentGroup = ["Marchent", "users/index.php"];
$currentPage = "Dashboard";

require __DIR__ . '/../components/header.php';
?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
</head>
<body>
  <?php require __DIR__ . "/../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../components/breadcrumb/merchant/primary.php' ?>
    <section class="mx-4">
      <div class="row g-3 mb-4">
        <!-- Start Col-1 -->
        <div class=" col-xl-3 col-lg-6 col-sm-6 col-md-6">
          <div class="card p-3 shadow border border-1 rounded" style="background-color:rgba(128, 0, 128, 0.1);">
            <div class="row ps-3 gx-3">
              <div class="icon d-flex align-items-center justify-content-center col-2">
                <h2 style="color: purple;" class=""><i class=" p-2 me-3 rounded-3 opacity-75 fa-solid fa-cart-shopping "></i></h2>
              </div>
              <div class="content col-10 pe-0">
                <h6 class="mb-1">Total Orders</h6>
                <h3 class="text-bold">34567</h3>
                <p class="text-sm text-success">
                  <small><i class="fa-solid fa-arrow-up"></i></small> +2.00%<span class="text-secondary"> (All time)</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- End Col -->

        <!-- Start Col-2 -->
        <div class=" col-xl-3 col-lg-6 col-sm-6 col-md-6">
          <div class="card p-3 shadow border border-1 rounded " style="background-color:rgba(0, 158, 0, 0.1);">
            <div class="row ps-3 gx-3 ">
              <div class="icon d-flex align-items-center justify-content-center col-2">
                <h2 style="color: green;" class=""><i class="p-2 px-3 me-3 rounded-3 opacity-75 fa-solid fa-bangladeshi-taka-sign  "></i></h2>
              </div>
              <div class="content col-10 pe-0">
                <h6 class="mb-1">Total Income</h6>
                <h3 class="text-bold">$74,567</h3>
                <p class="text-sm text-success">
                  <small><i class="fa-solid fa-arrow-up"></i></small> +5.45% <span class="text-secondary">Increased</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- End Col -->

        <!-- Start Col-3 -->
        <div class=" col-xl-3 col-lg-6 col-sm-6 col-md-6">
          <div class="card p-3 shadow border border-1 rounded " style="background-color:rgba(0, 0, 255, 0.1);">
            <div class="row ps-3 gx-3 ">
              <div class="icon d-flex align-items-center justify-content-center col-2">
                <h2 style="color: blue;" class=""><i class=" p-2 me-3 rounded-3 opacity-50 fa-solid fa-wallet"></i></h2>
              </div>
              <div class="content col-10 pe-0">
                <h6 class="mb-1">Total Expense</h6>
                <h3 class="text-bold">$24,567</h3>
                <p class="text-sm text-danger">
                  <small><i class="fa-solid fa-arrow-down"></i></small> -2.00%
                  <span class="text-gray">Expense</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- End Col -->

        <!-- Start Col-4 -->
        <div class=" col-xl-3 col-lg-6 col-sm-6 col-md-6">
          <div class="card p-3 shadow border border-1 p-unded " style="background-color:rgba(255, 165, 0, 0.14);">
            <div class="row ps-3 gx-3 ">
              <div class="icon d-flex align-items-center justify-content-center col-2">
                <h2 style="color: orange;" class=""><i class=" p-2 me-3 rounded-3 opacity-75 fa-solid fa-users"></i></h2>
              </div>
              <div class="content col-10 pe-0">
                <h6 class="mb-1">Total User</h6>
                <h3 class="text-bold">743</h3>
                <p class="text-sm text-success">
                  <small><i class="fa-solid fa-arrow-up"></i></small>
                  <span class="">Increased</span>
                </p>
              </div>
            </div>
          </div>
        </div>  
        <!-- End Col -->
      </div>

        <div class="row m-1">
            <div class="card mb-3 p-4 pt-0">
              <div class="d-flex flex-wrap align-items-center justify-content-between p-4">
                <div class="">
                  <h4 class="mb-2">Sales Overview</h4>
                </div>
                <div class="right">
                  <div class=" mb-2">
                    <div class="right">
                      <select class="form-select pe-5 me-1">
                        <option value="">Yearly</option>
                        <option value="">Monthly</option>
                        <option value="">Weekly</option>
                      </select>
                    </div>
                  </div>
                  <!-- end select -->
                </div>
              </div>
              <!-- End Title -->
              <div class="chart">
                 <div class="row border h6 mb-4 border-2 rounded d-flex align-items-center justify-content-center">
                  <div class="col-4 text-center p-2">
                    <p class="text-success m-0">
                    <span class=""><i class="fas fa-circle" style="color: #9B51E0"></i></span> &nbsp; &nbsp;
                      <span class="text-dark">Revenue</span> +25.55%
                      <i class="fa-solid fa-arrow-up"></i>
                    </p>
                  </div>
                  <div class="col-4 text-center p-2">
                    <p class="text-success m-0">
                      <span class=""><i class="fas fa-circle" style="color: #4A6CF7"></i></span> &nbsp; &nbsp;
                        <span class="text-dark">Net Profit</span> +45.55%
                        <i class="fa-solid fa-arrow-up"></i>
                    </p>
                  </div>
                  <div class="col-4 text-center p-2">
                    <p class="text-danger m-0">
                      <span class=""><i class="fas fa-circle" style="color: #F2994A"></i></span> &nbsp; &nbsp;
                        <span class="text-dark">Order</span>  -4.2%
                        <i class="fa-solid fa-arrow-down"></i>
                    </p>
                  </div>
                 </div>
                <canvas id="Chart3" style="width: 100%; height: 450px"></canvas>
              </div>
            </div>
          </div>

    </section>
  </main>
  <script>
        // =========== chart three start
        const ctx3 = document.getElementById("Chart3").getContext("2d");
    const chart3 = new Chart(ctx3, {
      // The type of chart we want to create
      type: "line", // also try bar or other graph types

      // The data for our dataset
      data: {
        labels: [
          "Jan",
          "Fab",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        // Information about the dataset
        datasets: [
          {
            label: "Revenue",
            backgroundColor: "transparent",
            borderColor: "#4a6cf7",
            data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#4a6cf7",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
          },
          {
            label: "Profit",
            backgroundColor: "transparent",
            borderColor: "#9b51e0",
            data: [
              120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
            ],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#9b51e0",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
          },
          {
            label: "Order",
            backgroundColor: "transparent",
            borderColor: "#f2994a",
            data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#f2994a",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
          },
        ],
      },

      // Configuration options
      options: {
        tooltips: {
          intersect: false,
          backgroundColor: "#fbfbfb",
          titleFontColor: "#8F92A1",
          titleFontSize: 16,
          titleFontFamily: "Inter",
          titleFontStyle: "400",
          bodyFontFamily: "Inter",
          bodyFontColor: "#171717",
          bodyFontSize: 16,
          multiKeyBackground: "transparent",
          displayColors: false,
          xPadding: 30,
          yPadding: 15,
          borderColor: "rgba(143, 146, 161, .1)",
          borderWidth: 1,
          title: false,
        },

        title: {
          display: false,
        },

        layout: {
          padding: {
            top: 0,
          },
        },

        legend: false,

        scales: {
          yAxes: [
            {
              gridLines: {
                display: false,
                drawTicks: false,
                drawBorder: false,
              },
              ticks: {
                padding: 35,
                max: 300,
                min: 50,
              },
            },
          ],
          xAxes: [
            {
              gridLines: {
                drawBorder: false,
                color: "rgba(143, 146, 161, .1)",
                zeroLineColor: "rgba(143, 146, 161, .1)",
              },
              ticks: {
                padding: 20,
              },
            },
          ],
        },
      },
    });
    // =========== chart three end

  </script>
  
</body>

</html>