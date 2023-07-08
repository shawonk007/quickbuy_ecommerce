<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "Coustomer Massage";
$pageGroup = "Coustomer Massage";
$currentGroup = ["Marchent", "users/index.php"];
$currentPage = "Coustomer Massage";
require __DIR__ . '/../../components/header.php';
// require_once "../connection.php";
?>

<body>
  <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
    <section class="m-3 ">
      <div class="row g-0 mb-5">
        <div class="col-md-6 col-lg-5 col-xl-4 col-xxl-4 mb-3">
          <div class="card">
            <div class="card-header bg-danger text-white">
              <h5 class="font-weight-bold m-2 text-center">Coustomer</h5>
            </div>
            <div class="card-body">
              <div class="input-group rounded mb-3 ">
                <input type="search" class="form-control rounded-start border-1 border-dark" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text btn btn-secondary border-1 border-dark" id="search-addon">
                  <i class="fas fa-search"></i>
                </span>
              </div>
              <ul class="list-unstyled mb-0">

                <li class="p-2 border-bottom rounded active" style="background-color: #e3e3e3;">
                  <a href="#!" class="d-flex justify-content-between text-decoration-none">
                    <div class="d-flex flex-row">
                      <img src="https://i.pravatar.cc/200" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-lg" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0 text-dark">John Doe</p>
                        <p class="small text-muted">Hello, Are you there?</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Just now</p>
                      <span class="badge bg-danger float-end">1</span>
                    </div>
                  </a>
                </li>

                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between text-decoration-none">
                    <div class="d-flex flex-row">
                      <img src="https://i.pravatar.cc/134" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0 text-dark">Danny Smith</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">5 mins ago</p>
                      <span class="text-muted float-end"><i class="fas fa-check text-primary" aria-hidden=""></i></span>
                      <span class="text-muted float-end"><i class="fas fa-check text-primary" aria-hidden=""></i></span>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between text-decoration-none">
                    <div class="d-flex flex-row">
                      <img src="https://i.pravatar.cc/232" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0 text-dark">Alex Steward</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between text-decoration-none">
                    <div class="d-flex flex-row">
                      <img src="https://i.pravatar.cc/332" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0 text-dark">Ashley Olsen</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between text-decoration-none">
                    <div class="d-flex flex-row">
                      <img src="https://i.pravatar.cc/214" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0 text-dark">Kate Moss</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between text-decoration-none">
                    <div class="d-flex flex-row">
                      <img src="https://i.pravatar.cc/125" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0 text-dark">Lara Croft</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                    </div>
                  </a>
                </li>
                <li class="p-2">
                  <a href="#!" class="d-flex justify-content-between text-decoration-none">
                    <div class="d-flex flex-row">
                      <img src="https://i.pravatar.cc/326" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1">
                        <p class="fw-bold mb-0 text-dark">Brad Pitt</p>
                        <p class="small text-muted">Lorem ipsum dolor sit.</p>
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Yesterday</p>
                      <span class="text-muted float-end"><i class="fas fa-check" aria-hidden=""></i></span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-7 col-xl-8 col-xxl-8">
          <div class="container-fluid">
            <div class="row d-flex justify-content-center">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-12 col-xxl-12">
                <div class="card">
                  <div class="card-header bg-danger p-3 text-white justifiy-content-between text-right ">
                    <h5 class="mb-0 fw-bolder text-center">John Doe &nbsp;<small><i class="text-success fa-solid fa-circle fa-beat-fade fa-xs"></i></small></h5>
                  </div>
                  <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; overflow:auto; height: 578px">

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
        </div>
    </section>
</body>

</html>