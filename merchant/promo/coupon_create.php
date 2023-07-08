<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "promos";
$pageGroup = "promos";
$currentPage = "promos";
require __DIR__ . '/../../components/header.php';
// require_once "../connection.php";
?>

<?php
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// if (isset($_POST['submit'])) {
//     $title = $_POST['title'];
//     $code = $_POST['code'];
//     $discount = $_POST['discount'];
//     $pdesc = $_POST['pdesc'];
//     $ptype = $_POST['ptype'];
//     $dtype = $_POST['dtype'];
//     $sdate = $_POST['sdate'];
//     $edate = $_POST['edate'];
//     $status = $_POST['status'];
//     $sql = "INSERT INTO `promos` VALUES('', '', '$title', '$code', '$pdesc', '$ptype', '$dtype', '$discount', '$sdate', '$edate', '$status', '', 'NOW()', 'NOW()')";
//     $result = $conn->query($sql);
//     if ($result) {
//         // echo "Insert the value Successfully";
//         echo "<script>window.location.replace('coupon-view.php');</script>";
//         // header('Location: coupon-view.php');
//     } else {
//         echo "Error inserting record: " . $conn->error;
//     }
// }
// $conn->close();
?>

<body>
    <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
    <main id="content">
        <!-- BREADCRUM -->
        <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
        <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
        <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
        <!-- YOUR CONTENT STARTS form HERE -->
        <section class="my-2 mx-2 d-flex align-items-center justify-content-center">
            <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8 col-xxl-8">
                <form action="<?= config("app.root") ?>src/actions/promo/store.php" method="post" class="" enctype="multipart/form-data">
                    <div class="card">                        
                        <h4 class="card-header text-center bg-danger text-light">Create New Promo</h4>
                        <div class="card-body">
                            <input type="hidden" name="merchant" value="1">
                            <div class="form-floating mb-3">
                                <input type="text" name="title" class="d-inline-flex form-control focus-ring focus-ring-danger text-decoration-none" id="title" placeholder="Something Special">
                                <label for="title">Promo Title</label>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group col">
                                    <button class="btn bg-secondary-subtle" type="button" id="makePromo">
                                        <i class="fas fa-refresh"></i>
                                    </button>
                                    <input type="text" name="code" class="form-control form-control-sm text-center" id="promoInput" placeholder="XXXX-XXXX-XXXX" style="text-transform: uppercase;" required />
                                </div>
                                <div class="form-floating col-6">
                                    <input type="text" name="discount" class="form-control" id="discount" placeholder="XXXX-XXXX-XXXX">
                                    <label for="discount" class="ms-3">Discount</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="description" style="height: 180px"></textarea>
                                <label for="description">Descrioption (Optional) </label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="restriction" placeholder="Leave a comment here" id="restriction" style="height: 80px"></textarea>
                                <label for="restriction">Restriction (Optional) </label>
                            </div>
                            <div class="row">
                                <div class="form-floating col-6 mb-3 ">
                                    <input type="datetime-local" name="start" class="form-control " id="start" placeholder="XXXX-XXXX-XXXX">
                                    <label for="start" class="ms-2">Start Date</label>
                                </div>
                                <div class="form-floating col-6 mb-3">
                                    <input type="datetime-local" name="expire" class="form-control" id="expire" placeholder="XXXX-XXXX-XXXX">
                                    <label for="expire" class="ms-2">Expire Date</label>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-4 form-group form-outline">
                                    <div class="">
                                        <select id="country" class="form-select " name="p_type">
                                            <option value="">-- Promo Type --</option>
                                            <option value="1">Coupon</option>
                                            <option value="2">Voucher</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 form-group form-outline">
                                    <div class="">
                                        <select id="country" class="form-select " name="d_type">
                                            <option value="">-- Discount Type --</option>
                                            <option value="1">Percentage</option>
                                            <option value="2">Flat Discount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 form-group form-outline">
                                    <div class="">
                                        <select id="country" class="form-select" name="status">
                                            <option value="">-- Choose Status --</option>
                                            <option value="1">Active</option>
                                            <option value="0">Expire</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="card-footer border-top-0 bg-white mt-0">
                            <div class="row my-2 gx-3">
                                <div class="col d-grid">
                                    <a href="./coupon-view.php" class="fs-5  btn btn-danger shadow-lg">Cancel</a>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" name="submit" class="fs-5 btn btn-primary shadow-lg">Create
                                        Promo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <br><br><br>
    </main>
    <script>
    $(document).ready(function() {
      $('#storeName').select2({
        theme: 'bootstrap-5'
      });
      $("#makePromo").click(function() {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        var promoCode = '';
        for (var i = 0; i < 12; i++) {
          var randomIndex = Math.floor(Math.random() * characters.length);
          promoCode += characters.charAt(randomIndex);
          if ((i + 1) % 4 === 0 && i !== 11) {
            promoCode += '-';
          }
        }
        $("#promoInput").val(promoCode);
      });
    });
  </script>
</body>
</html>