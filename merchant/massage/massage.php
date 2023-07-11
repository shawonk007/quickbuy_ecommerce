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

$pageName = "Admin Massage";
$pageGroup = "Admin Massage";
$currentGroup = ["Marchent", "users/index.php"];
$currentPage = "Admin Massage";

require __DIR__ . '/../../components/header.php';
?>

<body>
  <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="m-3 ">
      <div class="container py-2 pb-3 rounded shadow border border-1">
        <div class="row d-flex justify-content-center">
          <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6 col-xxl-6">
            <div class="card" id="chat2">
              <div class="card-header bg-danger d-flex justify-content-between align-items-center p-3">
                <h5 class="mb-0 text-white d-flex fw-bolder text-center align-items-center">Chat with admin</h5>
              </div>
              <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; overflow:auto; height: 400px">

                <div class="d-flex flex-row justify-content-start">
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/200" alt="avatar 1" style="width: 45px; height: 100%;">
                  <div>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: rgba(0, 0, 0, 0.1);">Hi</p>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: rgba(0, 0, 0, 0.1);">How are you ...???</p>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: rgba(0, 0, 0, 0.1);">What are you doing
                      tomorrow? Can we come up a bar?</p>
                    <p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>
                  </div>
                </div>
                <div class="divider d-flex align-items-center mb-4">
                  <div class="container">
                    <div class="d-flex align-items-center">
                      <hr class="flex-grow-1">
                      <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
                      <hr class="flex-grow-1">
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                  <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Hiii, I'm good.</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">How are you doing?</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Long time no see! Tomorrow
                      office. will
                      be free on sunday.</p>
                    <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:06</p>
                  </div>
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/300" alt="avatar 1" style="width: 45px; height: 100%;">
                </div>

                <div class="d-flex flex-row justify-content-start mb-4">
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/200" alt="avatar 1" style="width: 45px; height: 100%;">
                  <div>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: rgba(0, 0, 0, 0.1);">Okay</p>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: rgba(0, 0, 0, 0.1);">We will go on
                      Sunday?</p>
                    <p class="small ms-3 mb-3 rounded-3 text-muted">00:07</p>
                  </div>
                </div>

                <div class="d-flex flex-row justify-content-end mb-4">
                  <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">That's awesome!</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">I will meet you Sandon Square
                      sharp at
                      10 AM</p>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Is that okay?</p>
                    <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:09</p>
                  </div>
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/300" alt="avatar 1" style="width: 45px; height: 100%;">
                </div>

                <div class="d-flex flex-row justify-content-start mb-4">
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/200" alt="avatar 1" style="width: 45px; height: 100%;">
                  <div>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: rgba(0, 0, 0, 0.1);">Okay i will meet
                      you on
                      Sandon Square</p>
                    <p class="small ms-3 mb-3 rounded-3 text-muted">00:11</p>
                  </div>
                </div>

                <div class="d-flex flex-row justify-content-end mb-4">
                  <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Do you have pictures of Matley
                      Marriage?</p>
                    <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:11</p>
                  </div>
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/300" alt="avatar 1" style="width: 45px; height: 100%;">
                </div>

                <div class="d-flex flex-row justify-content-start mb-4">
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/200" alt="avatar 1" style="width: 45px; height: 100%;">
                  <div>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: rgba(0, 0, 0, 0.1);">Sorry I don't
                      have. i
                      changed my phone.</p>
                    <p class="small ms-3 mb-3 rounded-3 text-muted">00:13</p>
                  </div>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <div>
                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Okay then see you on sunday!!
                    </p>
                    <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:15</p>
                  </div>
                  <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/300" alt="avatar 1" style="width: 45px; height: 100%;">
                </div>

              </div>
              <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                <img class="rounded-circle border border-1 border-dark" src="https://i.pravatar.cc/300" alt="avatar 3" style="width: 45px; height: 100%;">
                <input type="text" class="form-control form-control-lg ms-3" id="exampleFormControlInput1" placeholder="Type message">
                <a class="ms-3 btn btn-primary px-3" href="#!">Send</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>