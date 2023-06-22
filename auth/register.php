<?php
require __DIR__ . '../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Register";
$root = config("app.root");
$auth = config("app.auth");
require __DIR__ . '/../components/header/secondary.php';
?>
<style>
  .gradient-custom-3 {
    background: #fccb90;
    background: -webkit-linear-gradient(to left, #518ac8, #6776c2, #6d69ba, #8250a0);
    background: linear-gradient(to left, #518ac8, #6776c2, #6d69ba, #8250a0);
  }

  @media (min-width: 768px) {
    .gradient-form {
      height: 100vh !important;
    }
  }
  @media (min-width: 769px) {
    .gradient-custom-3 {
      border-top-left-radius: .3rem;
      border-bottom-left-radius: .3rem;
    }
  }
  @media (max-width: 767px) {
    .gradient-custom-3 {
      border-top-left-radius: .3rem;
      border-top-right-radius: .3rem;
    }
  }
  /* 1st : #DE3E86 #890F93 #2F0E67 #211054 #191049 */
</style>
<body>
  <main>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <!-- <section class="h-100 gradient-form" style="background: url('../assets/images/background-02.jpg') center center; background-size:cover;  background-position: fixed; background-color: #eee;"> -->
    <section class="h-100 gradient-form" style="background-image: radial-gradient(at top left, #DE3E86 0%, #890F93 35%, #2F0E67 50%, #211054 75%, #191049 100%); background-color: #eee;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black shadow-lg border-0">
              <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center gradient-custom-3">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">Discover a World of Possibilities</h4>
                    <p class="small mb-0">For buyers, our platform offers a diverse range of products from various trusted vendors. Discover unique items, compare prices, and make secure purchases, all within a user-friendly interface. Enjoy a seamless shopping experience tailored to your preferences.</p>
                    <div class="d-flex align-items-center justify-content-center pt-5">
                      <p class="mb-0 me-2">Already have an account?</p>
                      <a href="<?= $auth ?>login.php"" class="btn btn-outline-light">
                        <strong>LOGIN</strong>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center pt-5 pt-lg-0">
                      <a href="<?= $root ?>home.php">
                        <img src="<?= info()['logo'] ?>" style="width: 250px;" alt="logo" />
                      </a>
                      <h5 class="mt-2 mb-5 pb-1">"Discover, Explore, Shop!"</h5>
                    </div>
                    <form action="<?= config("app.root") ?>src/actions/auth/store.php" method="post" id="userRegister">
                      <!-- <p class="text-center mb-5">Please login to your account</p> -->
                      <div class="form-outline mb-4">
                        <div class="input-group input-group-sm">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" name="fname" class="form-control" id="fName" placeholder="First Name" />
                          <input type="text" name="lname" class="form-control" id="lName" placeholder="Last Name" />
                        </div>
                      </div>
                      <div class="row g-3 mb-4">
                        <div class="col">
                          <div class="form-outline">
                            <div class="input-group input-group-sm">
                              <span class="input-group-text"><i class="fas fa-at"></i></span>
                              <input type="text" name="uname" class="form-control" id="uName" placeholder="Username" />
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-outline">
                            <div class="input-group input-group-sm">
                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              <input type="tel" name="phone" class="form-control" id="phone" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-outline mb-4">
                        <div class="input-group input-group-sm">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com" />
                        </div>
                      </div>
                      <div class="form-outline mb-3">
                        <div class="input-group input-group-sm">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                          <input type="password" name="pass1" class="form-control" id="pass" placeholder="Password" />
                          <input type="password" name="pass2" class="form-control" id="cPass" placeholder="Comfirm Password" />
                        </div>
                        <!-- <label class="form-label" for="form2Example22">Password</label> -->
                      </div>
                      <div class="row d-flex align-items-center justify-content-between mb-3">
                        <div class="col">
                          <div class="form-check">
                            <input type="radio" name="role" class="form-check-input" id="customer" value="7" />
                            <label class="form-check-label" for="customer">as Customer</label>
                          </div>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <div class="form-check">
                            <input type="radio" name="role" class="form-check-input" id="merchant" value="6" />
                            <label class="form-check-label" for="merchant">as Merchant</label>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-primary fa-lg gradient-custom-3 ps-5 pe-5 mb-3" type="submit">
                          <i class="fas fa-right-to-bracket"></i>
                          <strong class="ps-2">REGISTER</strong>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
    $(document).ready(function() {
      $('#userRegister').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: '<?= config("app.root") ?>src/actions/auth/store.php',
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          success: function(response) {
            console.log(response);
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Congratulations',
                text: response.message,
                timer: 1500,
                showConfirmButton: false
              }).then(function() {
                window.location.href = "login.php";
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                timer: 2000,
                showConfirmButton: false,
              });
            }
          },
          error: function(xhr, status, error) {
            if (xhr.status === 400) {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Bad request. Please check your form data.',
                timer: 2000,
                showConfirmButton: false
              });
            } else if (xhr.status === 500) {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Internal server error. Please try again later.',
                timer: 2000,
                showConfirmButton: false
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while processing the request.',
                timer: 2000,
                showConfirmButton: true
              });
            }
          }
        });
      });
    });
  </script>
</body>
</html>