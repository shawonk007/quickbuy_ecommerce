<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "product-view";
$pageGroup = "product-view";
$currentGroup = ["Marchent", "users/index.php"];
$currentPage = "product-view";
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
            <div>
                <a href="<?= $root ?>products/create.php" class="btn btn-primary mb-3 ">+ Add Product</a>
            </div>
            <div class="card">
                <!-- Header -->
                <div class="card-header card-header-content-md-between">
                    <div class="mb-2 mb-md-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group ">
                                <div class=" input-group-text ">
                                    <label for="datatableSearch"><i class="bi-search"></i></label>
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
                    <div id="" class="">
                        <table id="" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table " style="width: 1297px;">
                            <thead class="border-bottom">
                                <tr role="row">
                                    <th style="width: 24px;">
                                        <div class="ms-3 me-0 form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </th>
                                    <th class=" right" style="width: 341px;">Product</th>
                                    <th class=" text-center" style="width: 114px;">Categroy</th>
                                    <!-- <th class=" text-center" style="width: 42px;">Stocks</th> -->
                                    <th class=" text-center" style="width: 125px;">SKU</th>
                                    <th class=" text-center" style="width: 87px;">Price</th>
                                    <th class=" text-center" style="width: 90px;">Quantity</th>
                                    <th class=" text-center" style="width: 100px;">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php                                                             
                                $sql = "SELECT products.*,product_images.product_image FROM products, product_images where products.product_id= product_images.product_id";
                                $result = $conn->query($sql);
                                if ($result) {
                                    foreach ($result as $k => $row) {
                                        $category = "";
                                        if ($row['product_category'] == 1) {
                                            $ptcategoryype = "Shoes";
                                        } elseif ($row['product_category'] == 2) {
                                            $category = "Electronics";
                                        } elseif ($row['product_category'] == 3) {
                                            $category = "Clothing";
                                        } elseif ($row['product_category'] == 4) {
                                            $category = "Others";
                                        } else {
                                            $category = "Pending";
                                        }
                                        // $season = "";
                                        // if ($row['product_season'] == 1) {
                                        //     $ptseasonype = "Shoes";
                                        // } elseif ($row['product_season'] == 2) {
                                        //     $season = "Electronics";
                                        // } elseif ($row['product_season'] == 3) {
                                        //     $season = "Clothing";
                                        // } elseif ($row['product_season'] == 4) {
                                        //     $season = "Others";
                                        // } else {
                                        //     $season = "Pending";
                                        // }
                                        ?>
                                        <tr role="row" class="odd">
                                            <td class="table-column-pe-0">
                                                <div class="ms-3 form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll1">
                                                </div>
                                            </td>
                                            
                                            <td class="d-flex align-items-center">
                                                <a class="text-decoration-none text-dark d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img class="border border-1 border-light rounded " src="uploads/<?= $row['product_image'] ?>" width="60px" alt="Image Description">
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 ms-3">
                                                        <p class="mb-0 fw-bold"><?= $row['product_title'] ?></p>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="text-center "><?= $row['product_category'] ?></td>
                                            <!-- <td>
                                        <div class="form-check form-switch d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="stocksCheckbox1"
                                                checked="">
                                            <label class="form-check-label" for="stocksCheckbox1"></label>
                                        </div>
                                    </td> -->
                                            <td class="text-center"><?= $row['product_sku'] ?></td>
                                            <td class="text-center"><?= $row['regular_price'] ?></td>
                                            <td class="text-center"><?= $row['product_sku'] ?></td>
                                            <td>
                                                <form action="" method="">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="proupdate.php?updateid=<?= $row['product_id'] ?>" class="btn btn-white btn btn-secondary border-light">
                                                            <i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a onclick="confirm('Are you sure delete this Product')" href="?deleteid=<?= $row['product_id'] ?>" class="btn btn-white btn btn-danger  border-light">
                                                            <i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                if (isset($_GET['deleteid'])) {
                                    $proid = $_GET['deleteid'];
                                    $sql = "DELETE from `products` where product_id = $proid";
                                    $r = $conn->query($sql);
                                    if ($r) {
                                        echo "<script>window.location.replace('product_view.php');</script>";
                                    } else {
                                        echo "Product Not Deleted";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <div class="col-sm-auto mb-0 rounded-2">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="" class="" aria-label="Activity pagination">
                                <div class="" id="">
                                    <ul id="" class="pagination">
                                        <li class="disabled"><a class="previous page-link" data-dt-idx="0" id="datatable_previous"><span aria-hidden="true">Prev</span></a></li>
                                        <li class=" active"><a class="page-link" data-dt-idx="1">1</a></li>
                                        <li class=""><a class="page-link" data-dt-idx="2">2</a></li>
                                        <li class=""><a class="page-link" data-dt-idx="2">3</a></li>
                                        <li class=""><a class="next page-link" data-dt-idx="3"><span aria-hidden="true">Next</span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
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