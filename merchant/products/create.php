<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use App\Auth;
use App\Database;

$db = new Database();
$pageName = "product-create";
$pageGroup = "product-create";
$currentGroup = ["Marchent", "users/index.php"];
$currentPage = "product-create";
require __DIR__ . '/../../components/header.php';
// require_once "../connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producttitle = $_POST['producttitle'];
    $sku = $_POST['sku'];
    $weight = $_POST['weight'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $description = $_POST['description'];
    $highlights = $_POST['highlights'];
    $regularprice = $_POST['regularprice'];
    $offerprice = $_POST['offerprice'];
    $stock = $_POST['stock'];
    // $available = $_POST['available'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $season = $_POST['season'];
    $tags = $_POST['tags'];
    $images = $_FILES['images'];
    $imageName = $images['name'];
    $newImageName = uniqid() . '.' . $imageName;
    $uploadDir = '../../uploads/';
    move_uploaded_file($images['tmp_name'], $uploadDir . $newImageName);

    $sql = "INSERT INTO `products`() VALUES('','','','$producttitle','$description','$category','$sku','$brand','$regularprice','$offerprice','$highlights','$tags','','','','')";
    $sql2 = "INSERT INTO `product_images` VALUES('','','$newImageName','')";
    //'$color', '$metal', '$weight', '$length', '$width', '$height', '$stock','$season'
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    if (($result) && ($result2)) {
        // echo "Insert the value Successfully";
        echo "<script>window.location.replace('product_view.php');</script>";
        // header('Location: coupon-view.php');
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
// $conn->close();
?>
<style>
    .note-toolbar button,
    .note-toolbar select {
        font-size: 10px;
    }
</style>

<body>
    <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
    <main id="content">
        <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
        <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
        <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
        <section class="container-fluid my-1">
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Product information</h4>
                            </div>
                            <!-- End Header -->
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="producttitle" class="form-label">Product Title </label>
                                    <input type="text" class="form-control" name="producttitle" id="producttitle" placeholder="lorem ispum">
                                </div>

                                <!-- End Form -->

                                <!-- End Row -->
                                <div class="mb-4">
                                    <label class="form-label" for="Description">Description </label>
                                    <textarea name="description" id="description" placeholder="Type product description here ..."></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="Highlights">Highlights </label>
                                    <textarea name="highlights" id="highlights" placeholder="Type product highlights here ..."></textarea>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">Product Shipment</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <!-- Form -->
                                                <div class="mb-4">
                                                    <label for="weight" class="form-label">Weight</label>
                                                    <input type="text" class="form-control" name="weight" id="weight" placeholder="554g">
                                                </div>
                                                <!-- End Form -->
                                            </div>
                                            <!-- End Col -->

                                            <div class="col-sm-3">
                                                <!-- Form -->
                                                <div class="mb-4 ">
                                                    <label for="Length" class="form-label">Length</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="length" id="length" placeholder="23cm">
                                                    </div>
                                                </div>
                                                <!-- End Form -->
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- Form -->
                                                <div class="mb-4 ">
                                                    <label for="Width" class="form-label">Width</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="width" id="width" placeholder="53cm">
                                                    </div>
                                                </div>
                                                <!-- End Form -->
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- Form -->
                                                <div class="mb-4 ">
                                                    <label for="Height" class="form-label">Height</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="height" id="Height" placeholder="74cm">
                                                    </div>
                                                </div>
                                                <!-- End Form -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">Product Attributes</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <h6 class="text-center">Attribute Set</h6>
                                                <select class="form-select pe-5 me-1">
                                                    <option value="">-Choose one-</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="text-center">Attribute Type</h6>
                                                <select class="form-select pe-5 me-1">
                                                    <option value="">-Choose one-</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="text-center">Arrtibute Value</h6>
                                                <input class="form-control" type="text" name="" id="" placeholder="Product title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Body -->
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="card mb-1 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Add Product Image</h4>
                            </div>
                            <!-- End Header -->
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Gallery -->
                                <div id="" class="row justify-content-sm-center gx-1">
                                    <div class="col-lg-2 col-md-3 col-sm-5 mb-3">
                                        <!-- Card -->
                                        <div class="card card-sm">
                                            <img class="card-img" src="https://i.pravatar.cc/200" width="12px" alt="Image Description">
                                            <div class="card-body">
                                                <div class="row text-center p-0">
                                                    <div class="col-6">
                                                        <a class="text-body" href="https://i.pravatar.cc/150">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                    <div class="col-6">
                                                        <a class="text-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-5 mb-3">
                                        <!-- Card -->
                                        <div class="card card-sm">
                                            <img class="card-img-top" src="https://i.pravatar.cc/235" alt="Image Description">
                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-6">
                                                        <a class="text-body" href="https://i.pravatar.cc/100">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                    <div class="col-6">
                                                        <a class="text-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-5 mb-3">
                                        <!-- Card -->
                                        <div class="card card-sm">
                                            <img class="card-img-top" src="https://i.pravatar.cc/245" alt="Image Description">
                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-6">
                                                        <a class="text-body" href="https://i.pravatar.cc/245">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                    <div class="col-6">
                                                        <a class="text-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-lg-2 col-md-3 col-sm-5 mb-3">
                                        <!-- Card -->
                                        <div class="card card-sm">
                                            <img class="card-img-top" src="https://i.pravatar.cc/240" alt="Image Description">

                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-6">
                                                        <a class="text-body" href="https://i.pravatar.cc/240">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                    <div class="col-6">
                                                        <a class="text-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Card -->

                                    </div>

                                    <div class="col-lg-2 col-md-3 col-sm-5 mb-3">
                                        <!-- Card -->
                                        <div class="card card-sm">
                                            <img class="card-img-top" src="https://i.pravatar.cc/240" alt="Image Description">

                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-6">
                                                        <a class="text-body" href="https://i.pravatar.cc/240">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                    <div class="col-6">
                                                        <a class="text-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Gallery -->
                                <!-- Dropzone -->
                                <div class="text-center flex-column">
                                    <!-- <form class=" justify-content-center" action="" method="post"> -->
                                    <img class=" text-center mx-auto" src="https://htmlstream.com/front-dashboard/assets/svg/illustrations/oc-browse.svg" alt="Image Description" width="70px">
                                    <label for="formFileMultiple" class="form-label d-inline">
                                        <h5>Drag and drop your file here
                                    </label>
                                    <label for="formFileMultiple" class="form-label "><small> or </small>Upload image</h5></label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="images" multiple />
                                    <!-- </form> -->
                                </div>
                                <!-- End Dropzone -->
                            </div>
                            <!-- Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4">
                        <!-- Card -->
                        <div class="card mb-3">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Pricing</h4>
                            </div>
                            <!-- End Header -->
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4">
                                    <div class="">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" name="sku" id="sku" placeholder="e.g KET400">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="mb-4 col-6">
                                        <label for="rprice" class="form-label">Regular Price</label>
                                        <div class="input-group">
                                            <input type="text" class="d-block form-control" name="regularprice" id="rprice" placeholder="000" aria-label="000">
                                        </div>
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="offerprice" class="form-label">Offer Price</label>
                                        <div class="input-group">
                                            <input type="text" class="d-block form-control" name="offerprice" id="offerprice" placeholder="000" aria-label="000">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4 col-6">
                                        <label for="categoryLabel-ts-control" class="form-label" id="categoryLabel-ts-label">Availabilty</label>
                                        <!-- Select -->
                                        <div class="">
                                            <select name="category" class="form-select">
                                                <option value="1" selected="">In Stock</option>
                                                <option value="2">Exclusive</option>
                                                <option value="3">Limited</option>
                                                <option value="4">Stock out</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <div class="mb-4 col-6">
                                        <label for="stock" class="form-label">In stock</label>
                                        <div class="input-group">
                                            <input type="text" class="d-block form-control" name="stock" id="stock" value="001" aria-label="001">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- End Col -->
                                    <div class="row">
                                        <div class="d-flex gap-3 text-end">
                                            <a href="./product_view.php" class="col-6 btn btn-secondary">Discard</a>
                                            <button type="submit" name="submit" class="col-6 btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Form -->
                            </div>
                            <!-- Body -->
                        </div>
                        <!-- End Card -->
                        <!-- Card -->
                        <div class="card">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Organization</h4>
                            </div>
                            <!-- End Header -->
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="brand" class="form-label">Brand</label>
                                    <input type="text" class="form-control" name="brand" id="brand" placeholder="eg. Nike" aria-label="eg. Nike">
                                </div>
                                <!-- End Form -->
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="categoryLabel-ts-control" class="form-label" id="categoryLabel-ts-label">Category</label>
                                    <!-- Select -->
                                    <div class="">
                                        <select name="main" class="select2 select2-bootstrap-5-theme w-100" id="mainCat">
                                            <option value="">-- Main Category --</option>

                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                <div class="mb-4">
                                    <label for="categoryLabel-ts-control" class="form-label" id="categoryLabel-ts-label">Sub-Category</label>
                                    <!-- Select -->
                                    <div class="">
                                        <select name="sub" class="select2 select2-bootstrap-5-theme w-100" id="subCat">
                                            <option value="">-- Sub Category --</option>

                                        </select>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                <label for="tagsLabel" class="form-label">Tags</label>
                                <input type="text" class="form-control" name="tags" id="tagsLabel" placeholder="Enter tags here #product">
                            </div>
                            <!-- Body -->
                        </div>
                        <div class="">
                            <!-- Card -->
                            <div class="card my-3 ">
                                <!-- Header -->
                                <div class="card-header">
                                    <h4 class="card-header-title">Feature Image</h4>
                                </div>
                                <!-- End Header -->
                                <div class="card-body">
                                    <div class="mb-1 rounded">
                                        <img class="mb-4 rounded" src="https://loremflickr.com/320/240/dog" alt="">
                                        <input class="form-control" type="file" id="formFileMultiple" name="images" multiple />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                </div>
                <br>
                <br>
                <!-- </form> -->
            </form>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $('#mainCat').add('#subCat').add('#productType').add('#brandName').add('#storeName').add('#productTags').select2({
                theme: 'bootstrap-5'
            });
            $('#description').summernote({
                height: 500,
                width: '100%',
                placeholder: 'Type product destails here ...',
            });
            $('#highlights').summernote({
                height: 200,
                width: '100%',
                placeholder: 'Type product highlights here ...',
            });
        });
    </script>
</body>

</html>