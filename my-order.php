<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Auth;
use App\Database;
$db = new Database();

$name = $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name'];

$pageName = "My Orders < {$name}";
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
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>
                    <button class="nav-link" id="nav-delivered-tab" data-bs-toggle="tab" data-bs-target="#nav-delivered" type="button" role="tab" aria-controls="nav-delivered" aria-selected="false">Delivered</button>
                    <button class="nav-link" id="nav-processing-tab" data-bs-toggle="tab" data-bs-target="#nav-processing" type="button" role="tab" aria-controls="nav-processing" aria-selected="false">Processing</button>
                    <button class="nav-link" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="false">Pending</button>
                    <button class="nav-link" id="nav-canceled-tab" data-bs-toggle="tab" data-bs-target="#nav-canceled" type="button" role="tab" aria-controls="nav-canceled" aria-selected="false">Canceled</button>
                </div>
            </nav>
        </section>
        <section class="tab-content container-fluid my-5" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="col d-flex align-items-center justify-content-center py-5">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 col-xxl-8">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <input type="search" name="search" id="search" value="search" placeholder="Type here search ..." class="form-control">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Order</th>
                                    <th>Order Date</th>
                                    <th>Order status</th>
                                    <!-- <th>Peyment</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>QBO0001</td>
                                    <td>nasir</td>
                                    <td>t-shirt</td>
                                    <td>2 minutes ago</td>
                                    <td>
                                        <span class="badge bg-success">Delivered</span>
                                        <!-- <span class="badge bg-info">Processing</span>
                        <span class="badge bg-secondary">Pending</span>
                        <span class="badge bg-danger">Canceled</span> -->
                                    </td>
                                    <!-- <td>card</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-delivered" role="tabpanel" aria-labelledby="nav-delivered-tab" tabindex="0">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="col d-flex align-items-center justify-content-center py-5">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 col-xxl-8">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <input type="search" name="search" id="search" value="search" placeholder="type here to search ..." class="form-control">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Order</th>
                                    <th>Order Date</th>
                                    <th>Order status</th>
                                    <!-- <th>Peyment</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>QBO0001</td>
                                    <td>nasir</td>
                                    <td>t-shirt</td>
                                    <td>2 minutes ago</td>
                                    <td>
                                        <span class="badge bg-success">Delivered</span>
                                        <!-- <span class="badge bg-info">Processing</span>
                        <span class="badge bg-secondary">Pending</span>
                        <span class="badge bg-danger">Canceled</span> -->
                                    </td>
                                    <!-- <td>card</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-processing" role="tabpanel" aria-labelledby="nav-processing-tab" tabindex="0">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="col d-flex align-items-center justify-content-center py-5">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 col-xxl-8">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <input type="search" name="search" id="search" value="search" placeholder="type here to search ..." class="form-control">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Order</th>
                                    <th>Order Date</th>
                                    <th>Order status</th>
                                    <!-- <th>Peyment</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>QBO0001</td>
                                    <td>nasir</td>
                                    <td>t-shirt</td>
                                    <td>2 minutes ago</td>
                                    <td>
                                        <span class="badge bg-success">Delivered</span>
                                        <!-- <span class="badge bg-info">Processing</span>
                        <span class="badge bg-secondary">Pending</span>
                        <span class="badge bg-danger">Canceled</span> -->
                                    </td>
                                    <!-- <td>card</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab" tabindex="0">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="col d-flex align-items-center justify-content-center py-5">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 col-xxl-8">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <input type="search" name="search" id="search" value="search" placeholder="type here to search ..." class="form-control">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Order</th>
                                    <th>Order Date</th>
                                    <th>Order status</th>
                                    <!-- <th>Peyment</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>QBO0001</td>
                                    <td>nasir</td>
                                    <td>t-shirt</td>
                                    <td>2 minutes ago</td>
                                    <td>
                                        <span class="badge bg-success">Delivered</span>
                                        <!-- <span class="badge bg-info">Processing</span>
                        <span class="badge bg-secondary">Pending</span>
                        <span class="badge bg-danger">Canceled</span> -->
                                    </td>
                                    <!-- <td>card</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-canceled" role="tabpanel" aria-labelledby="nav-canceled-tab" tabindex="0">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="col d-flex align-items-center justify-content-center py-5">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 col-xxl-8">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <input type="search" name="search" id="search" value="search" placeholder="type here to search ..." class="form-control">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="table-info">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Order</th>
                                    <th>Order Date</th>
                                    <th>Order status</th>
                                    <!-- <th>Peyment</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>QBO0001</td>
                                    <td>nasir</td>
                                    <td>t-shirt</td>
                                    <td>2 minutes ago</td>
                                    <td>
                                        <span class="badge bg-success">Delivered</span>
                                        <!-- <span class="badge bg-info">Processing</span>
                        <span class="badge bg-secondary">Pending</span>
                        <span class="badge bg-danger">Canceled</span> -->
                                    </td>
                                    <!-- <td>card</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </main>
</body>

</html