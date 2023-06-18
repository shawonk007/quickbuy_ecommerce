<?php
$pageName = "Edit Profile";
$pageGroup = "User Profile";
$currentPage = "Profile";
require __DIR__ . '/components/header/primary.php';
require __DIR__ . '/vendor/autoload.php';
?>

<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
    <main id="content">
        <!-- BREADCRUM -->
        <?php require_once "./includes/breadcrum.php" ?>
        <!-- YOUR CONTENT STARTS FROM HERE -->
        <section class="my-5">
            <div class="container-fluid">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <input type="text" name="" class="form-control" id="">
                                            <input type="text" name="" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="text" name="" class="form-control" id="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="date" name="" class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <input type="email" name="" class="form-control" id="">

                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <input type="email" name="" class="form-control" id="">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="tel" name="" class="form-control" id="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="tel" name="" class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 my-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <textarea name="" class="form-control" id="" cols="100" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">select</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">select</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">select</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">select</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">select</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <select name="" class="form-control" id="">
                                                        <option value="">select</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </form>
            </div>
        </section>
    </main>
</body>

</html>