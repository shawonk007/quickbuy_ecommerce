<?php
$pageName = "Merchant Dashboard";
$pageGroup = "Dashboard";
$currentPage = "Dashboard";
require __DIR__ . '/../../components/header/tertiary.php';
require_once "../includes/sidebar.php";
require_once "../connection.php";
?>
<body>
    <main id="content">
        <!-- BREADCRUM -->
        <?php require_once "../includes/breadcrum.php" ?>
        <!-- YOUR CONTENT STARTS FROM HERE -->
        <section class="my-2 mx-2 d-flex align-items-center justify-content-center">
            <?php
            $pid = $_GET['updateid'];
            $sql = "SELECT * from promos WHERE promo_id='$pid'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            extract($row);
            if (isset($_POST['submit'])) {
                $ptitle = $_POST['ptitle'];
                $pcode = $_POST['pcode'];
                $discount = $_POST['discount'];
                $pdesc = $_POST['pdesc'];
                $ptype = $_POST['ptype'];
                $dtype = $_POST['dtype'];
                $sdate = $_POST['sdate'];
                $edate = $_POST['edate'];
                $status = $_POST['status'];

                $sql = "UPDATE `promos` SET promo_id='$pid', promo_title='$ptitle', promo_code='$pcode', discount_value='$discount', promo_description='$pdesc', promo_type='$ptype', discount_type='$dtype', starting_date='$sdate', expiration_date='$edate', promo_status='$status' WHERE promo_id='$pid'";
                $result = $conn->query($sql);

                if ($result) {
                    // echo "Update the value Successfully";
                    echo "<script>window.location.replace('coupon-view.php');</script>";
                    // header('Location: coupon-view.php');
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            $conn->close();
            ?>
            <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8 col-xxl-8">
                <form action="" method="post" class="" enctype="multipart/form-data">
                    <div class="card">
                        <h4 class="card-header text-center bg-danger text-light">Create New Promo</h4>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="ptitle" value="<?= $row['promo_title'] ?>" class="d-inline-flex form-control focus-ring focus-ring-danger text-decoration-none" id="ptitle" placeholder="Something Special">
                                <label for="ptitle">Promo Title</label>
                            </div>
                            <div class="row">
                                <div class="form-floating col-6 mb-3 ">
                                    <input type="text" name="pcode" class="form-control" id="pcode" value="<?= $row['promo_code'] ?>" placeholder="XXXX-XXXX-XXXX">
                                    <label for="pcode" class="ms-2">Promo Code</label>
                                </div>
                                <div class="form-floating col-6 mb-3">
                                    <input type="text" name="discount" class="form-control" id="pcode" placeholder="XXXX-XXXX-XXXX" value="<?= $row['discount_value'] ?>">
                                    <label for="pcode" class="ms-3">Discount</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="pdesc" placeholder="Leave a comment here" id="descrioption" style="height: 180px"><?= $row['promo_description'] ?></textarea>
                                <label for="descrioption">Descrioption (Optional) </label>
                            </div>
                            <div class="row">
                                <div class="form-floating col-6 mb-3 ">
                                    <input type="datetime-local" name="sdate" class="form-control " id="sdate" placeholder="XXXX-XXXX-XXXX" value="<?= $row['starting_date'] ?>">
                                    <label for="sdate" class="ms-2">Start Date</label>
                                </div>
                                <div class="form-floating col-6 mb-3">
                                    <input type="datetime-local" name="edate" class="form-control" id="edate" placeholder="XXXX-XXXX-XXXX" value="<?= $row['expiration_date'] ?>">
                                    <label for="edate" class="ms-2">Expire Date</label>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-4 form-group form-outline">
                                    <div class="">
                                        <select id="country" class="form-select " name="ptype">
                                            <option value="" selected>-- Promo Type --</option>
                                            <option value="1" <?= isset($row['promo_type']) && $row['promo_type'] == 1 ? 'selected' : ''; ?>> Coupon</option>
                                            <option value="2" <?= isset($row['promo_type']) && $row['promo_type'] == 2 ? 'selected' : ''; ?>>Voucher</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 form-group form-outline">
                                    <div class="">
                                        <select id="country" class="form-select " name="dtype" value="<?= $row['dtype'] ?>">
                                            <option value="">-- Promo Type --</option>
                                            <option value="1" <?= isset($row['discount_type']) && $row['discount_type'] == 1 ? 'selected' : ''; ?>>Percentage</option>
                                            <option value="2" <?= isset($row['discount_type']) && $row['discount_type'] == 2 ? 'selected' : ''; ?>>Flat Discount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 form-group form-outline">
                                    <div class="">
                                        <select id="country" class="form-select" name="status">
                                            <option value="">-- Choose Status --</option>
                                            <option value="1" <?= isset($row['promo_status']) && $row['promo_status'] == 1 ? 'selected' : ''; ?>>Active</option>
                                            <option value="0" <?= isset($row['promo_status']) && $row['promo_status'] == 0 ? 'selected' : ''; ?>>Expire</option>
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
                                    <button type="submit" name="submit" class="fs-5 btn btn-primary shadow-lg">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <br><br><br>
    </main>
</body>

</html>