<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "coupon";
$pageGroup = "coupon";
$currentPage = "coupon";
require __DIR__ . '/../../components/header.php';
// require_once "../connection.php";
?>

<body>
    <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
    <main id="content">
        <!-- BREADCRUM -->
        <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
        <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
        <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
        <!-- YOUR CONTENT STARTS form HERE -->
        <section class="m-3">
            <section class="pb-4">
                <div class="bg-white border rounded-1">
                    <section class="w-100 p-4">
                        <div class="d-flex justify-content-end">
                            <a class="mb-2 btn btn-primary" href="coupon_create.php">+ Add New Coupon</a>
                        </div>
                        <div id="" class="">
                            <div class="table-responsive p-1" style=" overflow: auto; position: relative;">
                                <table class="table datatable-table data-table" style="width: 1500px;">
                                    <thead class="">
                                        <tr>
                                            <th class="fs-6">SL</th>
                                            <th class="fs-6">Promo Title</th>
                                            <th class="fs-6">Promo Code</th>
                                            <th class="fs-6">Discount</th>
                                            <th class="fs-6">Descrioption</th>
                                            <th class="fs-6">Start date</th>
                                            <th class="fs-6">Expire Date</th>
                                            <th class="fs-6">Promo Type</th>
                                            <th class="fs-6">Discount Type</th>
                                            <th class="fs-6">Status</th>
                                            <th class="fs-6">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-responsive">
                                        <?php
                                        $sql = "SELECT * FROM promos";
                                        $result = $conn->query($sql);
                                        if ($result) {
                                            foreach ($result as $k => $row) {
                                                $ptype = "";
                                                if ($row['promo_type'] == 1) {
                                                    $ptype = "Coupon";
                                                } elseif ($row['promo_type'] == 2) {
                                                    $ptype = "Voucher";
                                                } else {
                                                    $ptype = "Pending";
                                                }
                                                $dtype = "";
                                                if ($row['discount_type'] == 1) {
                                                    $dtype = "Percentage";
                                                } elseif ($row['discount_type'] == 2) {
                                                    $dtype = "Flat Discount";
                                                } else {
                                                    $dtype = "Pending";
                                                }
                                                $status = "";
                                                if ($row['promo_status'] == 1) {
                                                    $status = "Active";
                                                } elseif ($row['promo_status'] == 0) {
                                                    $status = "Expire";
                                                } else {
                                                    $status = "Pending";
                                                }

                                        ?>
                                                <!-- while ($row = mysqli_fetch_assoc($result))  -->

                                                <tr scope="row">
                                                    <td><?= $row['promo_id'] ?></td>
                                                    <td><?= $row['promo_title'] ?></td>
                                                    <td><?= $row['promo_code'] ?></td>
                                                    <td><?= $row['discount_value'] ?></td>
                                                    <td><?= $row['promo_description'] ?></td>
                                                    <td><?= $row['starting_date'] ?></td>
                                                    <td><?= $row['expiration_date'] ?></td>
                                                    <td><?= $ptype ?></td>
                                                    <td><?= $dtype ?></td>
                                                    <td><?= $status ?></td>
                                                    <td>
                                                        <a href="cupdate.php?updateid=<?= $row['promo_id'] ?>" class="btn-sm btn-white btn btn-secondary border-light"><i class="fa-solid fa-pen-to-square"></i></a>

                                                        <a onclick="confirm('Are you sure delete this coupon')" href="?deleteid=<?= $row['promo_id'] ?>" class="text-light btn-sm btn-white btn btn-danger border-light"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                        <?php }
                                        }
                                        if (isset($_GET['deleteid'])) {
                                            $pid = $_GET['deleteid'];
                                            $sql = "DELETE from `promos` where promo_id = $pid";
                                            $r = $conn->query($sql);
                                            if ($r) {
                                                echo "<script>window.location.replace('coupon-view.php');</script>";
                                            } else {
                                                echo "skladfjoiwaefoajfolsjfplj";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="datatable-pagination">
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </section>
    </main>
</body>

</html>