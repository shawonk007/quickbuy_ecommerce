<?php
use App\Database;
$db = new Database();
$pageName = "Login";
$root = "/quickbuy/";
require __DIR__ . '/../components/header/secondary.php';
require __DIR__ . '../../vendor/autoload.php';
?>
<style>
  .gradient-custom-2 {
    background: #fccb90;
    background: -webkit-linear-gradient(to right, #518ac8, #6776c2, #6d69ba, #8250a0);
    background: linear-gradient(to right, #518ac8, #6776c2, #6d69ba, #8250a0);
  }

  @media (min-width: 768px) {
    .gradient-form {
      height: 100vh !important;
    }
  }
  @media (min-width: 769px) {
    .gradient-custom-2 {
      border-top-right-radius: .3rem;
      border-bottom-right-radius: .3rem;
    }
  }
  @media (max-width: 767px) {
    .gradient-custom-2 {
      border-bottom-left-radius: .3rem;
      border-bottom-right-radius: .3rem;
    }
  }
</style>
<body>
  <main>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <!-- <section class="h-100 gradient-form" style="background-color: #eee;"> -->
    <section class="h-100 gradient-form" style="background-image: radial-gradient(at top left, #DE3E86 0%, #890F93 35%, #2F0E67 50%, #211054 75%, #191049 100%); background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black shadow">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center pt-5 pt-lg-0">
                      <a href="<?= $root ?>home.php">
                        <img src="<?= info()['logo'] ?>" style="width: 250px;" alt="logo" />
                      </a>
                      <h5 class="mt-2 mb-5 pb-1">"Discover, Explore, Shop!"</h5>
                    </div>
                    <form action="" method="post">
                      <p class="text-center mb-5">Please login to your account</p>
                      <div class="form-outline mb-4">
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="email" name="" class="form-control" id="" placeholder="Username, Phone or Email" />
                        </div>
                        <!-- <label class="form-label" for="form2Example11">Username</label> -->
                      </div>
                      <div class="form-outline mb-4">
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                          <input type="password" name="password" class="form-control" id="" placeholder="Password" />
                        </div>
                        <!-- <label class="form-label" for="form2Example22">Password</label> -->
                      </div>
                      <div class="row d-flex align-items-center justify-content-between mb-4">
                        <div class="col">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="remember" value="" />
                          <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        </div>
                        <div class="col text-end">
                          <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-primary fa-lg gradient-custom-2 ps-5 pe-5 mb-3" type="button">
                          <i class="fas fa-right-to-bracket"></i>
                          <strong class="ps-2">LOGIN</strong>
                        </button>
                      </div>
                      <!-- <div class="text-center pt-1 mb-5 pb-1">
                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                          in</button>
                        <a class="text-muted" href="#!">Forgot password?</a>
                      </div> -->
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">Discover a World of Possibilities</h4>
                    <p class="small mb-0">For buyers, our platform offers a diverse range of products from various trusted vendors. Discover unique items, compare prices, and make secure purchases, all within a user-friendly interface. Enjoy a seamless shopping experience tailored to your preferences.</p>
                    <div class="d-flex align-items-center justify-content-center pt-5">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <a href="register.php"" class="btn btn-outline-light">
                        <strong>Create new</strong>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>