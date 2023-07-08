<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "product";
$pageGroup = "product";
$currentGroup = ["Marchent", "users/product.php"];
$currentPage = "product";
require __DIR__ . '/../../components/header.php';
// require_once "../connection.php";
?>
<body>
<?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
  <main id="content">
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
        <section class="m-3">
            <a href="create.php" class="btn btn-primary mb-3 ">+ Add Product</a>
            <div class="card">
                <!-- Header -->
                <div class="card-header card-header-content-md-between">
                    <div class="mb-2 mb-md-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group ">
                                <div class=" input-group-text ">
                                    <label for="datatableSearch"><i class="fa-solid fa-search"></i></label>
                                </div>
                                <input id="datatableSearch" name="" type="search" class="form-control focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" placeholder="Search Products">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                </div>

                <!-- End Header -->

                <!-- Table -->
                <div class="table-responsive">
                    <div id="" class="m-2 p-1">
                        <table id="" class="table table-borderless table-thead-bordered data-table">
                            <thead class="border-bottom">
                                <tr role="row">
                                    <th class=" text-start" style="width: 340px;" >Product</th>
                                    <th class=" text-center" >Categroy</th>
                                    <th class=" text-center" >Stocks</th>
                                    <th class=" text-center" >SKU</th>
                                    <th class=" text-center" >Price</th>
                                    <th class=" text-center" >Quantity</th>
                                    <th class=" text-center" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="">
                                    <td class="d-flex align-items-center">
                                        <a class="text-decoration-none text-dark d-flex align-items-center">
                                            <div class="">
                                                <img class="border border-1 border-light rounded " src="https://i.pravatar.cc/210" width="60px" alt="Image Description">
                                            </div>
                                            <div class="ms-3">
                                                <p class="mb-0 fw-bold">Photive wireless Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum eum enim </p>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center ">Electronics</td>

                                    <td>
                                        <div class="form-check form-switch d-flex justify-content-center">

                                            <input class="form-check-input" type="checkbox" id="stocksCheckbox1" checked="">
                                            <label class="form-check-label" for="stocksCheckbox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">2384741241</td>
                                    <td class="text-center">$65</td>
                                    <td class="text-center">60 pcs</td>
                                    <td class="text-center">
                                        <div class="">
                                            <a class="btn btn-white btn-sm btn-secondary border-light">
                                                <i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="btn btn-white btn-sm btn-danger border-light">
                                                <i class="fa-solid fa-trash"></i></a>
                                        </div>                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- End Table -->

                <!-- Footer -->
                
                <!-- End Select -->



                <!-- Pagination Quantity -->

            </div>
            </div>
            <!-- End Col -->

            <!-- End Col -->
            </div>
            <!-- End Row -->
            </div>
            <!-- End Footer -->
            </div>

        </section>
    </main>
</body>

</html>