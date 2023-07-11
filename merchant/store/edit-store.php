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

$pageName = "Settings";
$pageGroup = "Settings";
$currentPage = "Settings";

require __DIR__ . '/../../components/header.php';
?>

<head>
    <style>
        .info label {
            font-size: 20px;
            text-align: right;
        }

        @media screen and (max-width:991px) {
            .info label {
                text-align: left;
                display: inline;
            }
        }

        #sidebarMenu {
            position: sticky;
        }

        #sidebarMenu .active {
            border-radius: 8px;
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <?php require __DIR__ . "/../../components/sidebar/merchant.php" ?>
    <main id="content">
        <!-- BREADCRUM -->
        <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
        <?php require __DIR__ . "/../../components/navbar/merchant.php" ?>
        <?php include __DIR__ . '/../../components/breadcrumb/merchant/primary.php' ?>
        <!-- YOUR CONTENT STARTS form HERE -->
        <section class="m-3">
            <div class="container-fluid shadow shadow-lg border border-1 rounded">
                <div class="row m-auto">
                    <!-- <div class="col-2 shadow-lg"> -->
                    <!--Main Navigation-->
                    <!-- SubSidebar -->
                    <!-- <div id="sidebarMenu" class="d-lg-block bg-white">
                            <div class="sticky-top" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                                <div class="list-group list-group-flush mx-1 mt-2" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                                    <a href="#info" class="list-group-item list-group-item-action py-3 px-0" aria-current="true">
                                        <i class="fas fa-gear fa-fw me-3"></i><span class="d-none d-md-inline">General</span></a>
                                    <a href="#description" class="list-group-item list-group-item-action py-3 px-0 ">
                                        <i class="fas fa-pen-to-square me-3"></i><span class="d-none d-md-inline">Description</span></a>
                                    <a href="#logo" class="list-group-item list-group-item-action py-3 px-0">
                                        <i class="fas fa-atom me-3"></i><span class="d-none d-md-inline">Logo</span></a>
                                    <a href="#bank" class="list-group-item list-group-item-action py-3 px-0"><i class="fas fa-building-columns me-3"></i><span class="d-none d-md-inline">Bank Account</span></a>
                                    <a href="#social_account" class="list-group-item list-group-item-action py-3 px-0"><i class="fas fa-square-share-nodes me-3"></i><span class="d-none d-md-inline">Social Profiles</span></a>
                                    <a href="#example" class="list-group-item list-group-item-action py-3 px-0"><i class="fas fa-user-pen me-3"></i><span class="d-none d-md-inline">Example</span></a>
                                </div>
                            </div>
                        </div> -->
                    <!-- SubSidebar -->
                    <!-- </div> -->
                    <div class="">
                        <form class="" action="" method="" enctype="multipart/form-data">

                            <div id="content_detailed" class="info row">
                                <h2 id="info" class="col-12 m-2 text-center">Information</h2><br>
                                <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                                <div class="row px-3 py-1 ">
                                    <label for="sname" class="form-label col">Store Name:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <input class="form-control rounded border border-dark p-1 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" type="text" id="sname" name="" size="50" value="BestBuy" class=" ">
                                    </div>
                                </div>

                                <div class="row px-3 py-1  form-outli-lgne col-sm-12">
                                    <label for="phone" class="form-label col">Phone:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <input class="form-control rounded border border-dark p-1 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" type="text" id="phone" name="" size="50" value="" class="" inputmode="numeric">
                                    </div>
                                </div>

                                <div class="row px-3 py-1   ">
                                    <label for="email" class="form-label col">E-mail:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <input class="form-control rounded border border-dark p-1 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" type="text" id="email" name="email" size="50" value="" class=" ">
                                    </div>
                                </div>

                                <div class="row px-3 py-1 d-flex">
                                    <label for="address" class="form-label col">Address 1:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <input class="form-control rounded border border-dark p-1 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" type="text" id="address" name="address" size="50" value="" class=" ">
                                    </div>
                                </div>
                                <div class="row px-3 py-1  ">
                                    <label for="address" class="form-label col">Address 2:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <input class="form-control rounded border border-dark p-1 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" type="text" id="address" name="address" size="50" value="" class=" ">
                                    </div>
                                </div>

                                <div class="row px-3 py-1  ">
                                    <label for="city" class="form-label col">City:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <input class="form-control rounded border border-dark p-1 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" type="text" id="city" name="" size="50" value="" class=" ">
                                    </div>
                                </div>

                                <div class="row px-3 py-1 ">
                                    <label for="country" class="form-label col">Country:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <select id="country" class="form-select focus-ring border border-dark" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" name="">
                                            <option>- Select Country -</option>
                                            <option>Dhaka</option>
                                            <option>Barishal</option>
                                            <option>Khulna</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row px-3 py-1  ">
                                    <label for="zip" class="form-label col">Zip/postal
                                        code:</label>
                                    <div class="col-auto col-lg-8 col-sm-12 me-5">
                                        <input class="form-control rounded border border-dark p-1 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" type="text" id="zip" name="" size="50" value="" class=" ">
                                    </div>
                                </div>


                            </div>
                            <div id="content_detailed" class="info row">
                                <h2 id="description" class="col-12 m-2 text-center">Description</h2><br>
                                <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                                <div class="row px-3 py-1 ">
                                    <label for="" class="col form-label">Description:</label>
                                    <div class="col-lg-8 col-sm-12 me-5">
                                        <textarea class="form-control rounded border border-dark px-3 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" id="Description" name="" rows="8" value="" placeholder="QuickBuy Com. is an American multinational consumer electronics retailer headquartered in Richfield, Minnesota. It was originally founded by Richard M. Schulze and James Wheeler in 1966 as an audio specialty store called Sound of Music. In 1983, it was re-branded under its current name with an emphasis placed on consumer electronics."></textarea>
                                    </div>
                                </div>
                            </div>

                                    <!-- <div id="content_detailed" class="info row">
                        <h2 id="tac" class="col-12 m-2 text-center">Terms & conditions:</h2><br>
                        <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                        <div class="row px-3 py-1  ">
                        <label for="" class="col-lg-4 col-sm-12 form-label">Terms & conditions:</label>
                        <div class="col-lg-8 col-sm-12 me-5">
                            <textarea class="form-control rounded border border-dark px-3 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" id="tac" name="" rows="8" value="" placeholder="A site that sells products online. Allows users to create a purchase order, choose a payment method and deliver the order on the Internet. Having chosen the necessary goods or services, the user usually has the opportunity to select a method of payment and delivery on the site right away. The main difference between the Internet store and the traditional one is in the type of the trading platform."></textarea>
                        </div>
                        </div>
                    </div> -->

                            <div id="content_detailed" class="info">
                                <h2 id="logo" class="col-12 m-2 text-center">Shop Logo</h2>
                                <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                                <div class="text-center">
                                    <img src="https://i.pravatar.cc/200" width="100px" class="border border-1 border-dark rounded-circle" alt="LOGO">
                                </div>
                                <div class="row px-3 py-1  ">
                                    <label for="" class="col form-label">Image (300 x 300):</label>
                                    <div class="col-lg-9 col-sm-12 text-center me-5">
                                        <input class="form-control rounded border border-dark px-3 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" id="image" name="" rows="8" value="" type="file">
                                    </div>
                                </div>
                            </div>

                            <div id="content_detailed" class="info">
                                <h2 id="logo" class="col-12 m-2 text-center">Banner</h2>
                                <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                                <div class="text-center" style="margin:10px 60px;">
                                    <img src="https://picsum.photos/id/744/820/312" width="100%" class="border border-1 border-dark rounded" alt="banner">
                                </div>
                                <div class="row px-3 py-1">
                                    <label for="" class="col form-label">Image (820 x 312):</label>
                                    <div class="col-lg-9 col-sm-12 text-center me-5">
                                        <input class="form-control rounded border border-dark px-3 focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" id="image" name="" rows="8" value="" type="file">
                                    </div>
                                </div>
                            </div>

                            <!-- <div id="content_detailed" class="info row">
                <h2 id="seo" class="col-12 m-2 text-center">SEO</h2><br>
                <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                <div class="row px-3 py-1 3 ">
                  <div class="col-lg-6 input-group rounded ">
                    <label for="seo" class="col-lg-4 col-sm-12  col-sm-12 me pe-4 form-label">Page title:
                    </label>
                    <span class="input-group-text text-bg-secondary border border-dark rounded-start pe-3" id="seo">/ </span>
                    <input class="form-control border border-dark focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-white-rgb), .0)" aria-describedby="seo" id="seo" name="" value="" placeholder="Best tag for shop name">
                  </div>
                </div>
                <div class="row px-3 py-1  ">
                  <div class="col-lg-8 col-sm-12 me-5 input-group rounded d-flex d-inline ">
                    <label for="hashtag" class="col-lg-4 col-sm-12 me pe-4 form-label">Meta keywords:
                    </label>
                    <span class="input-group-text text-bg-secondary border border-dark rounded-start" id="hashtag">#</span>
                    <input class="form-control px-3 border border-dark focus-ring" style="--bs-focus-ring-color: rgba(var(--bs-dark-rgb), .0)" aria-describedby="seo" id="hashtag" name="" value="" placeholder="#onlineshopping #quickbuy">
                  </div>
                </div>
              </div> -->
                            <div id="content_detailed" class="info row">
                                <h2 id="bank" class="col-12 m-2 text-center">Bank Account</h2><br>
                                <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                            </div>

                            <div id="content_detailed" class="info row my-4">
                                <h2 id="social_account" class="col-12 m-2 text-center">Social Accounts</h2><br>
                                <hr class="mb-3" style="margin:auto; width:70%; size: 145px;" color="black" />
                                <div class="card-body">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </section>
    </main>
</body>

</html>