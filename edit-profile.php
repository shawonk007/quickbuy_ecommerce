<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Edit Profile";
require __DIR__ . '/components/header.php';
?>

<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
    <main id="content">
        <!-- YOUR CONTENT STARTS FROM HERE -->
        <section class="container-fluid py-5">
            <div class="">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 my-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <input type="text" name="fname" class="form-control" id="" placeholder="First name">
                                            <input type="text" name="lname" class="form-control" id="" placeholder="Last name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="text" name="uname" class="form-control" id="" placeholder="User name">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="date" name="" class="form-control" id="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <input type="email" name="" class="form-control" id="" placeholder="Email address">

                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <label for=""></label>
                                        <div class="input-group">
                                            <input type="email" name="" class="form-control" id="" placeholder="Cell phone">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="tel" name="" class="form-control" id="" placeholder="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="from-group">
                                                <label for=""></label>
                                                <div class="input-group">
                                                    <input type="tel" name="" class="form-control" id="" placeholder="">
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