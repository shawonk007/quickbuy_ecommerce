<?php
require __DIR__ . '../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
$db = new Database();
$pageName = "Admin Login";
require __DIR__ . '/../components/header/secondary.php';
?>
<body>
  <main>
    <section class="d-flex align-items-center justify-content-center vh-100">
        <form action="" method="post">
          <div class="card shadow" style="width: 25rem;">
            <div class="card-header bg-primary pb-0">
              <h4 class="card-title text-white py-0" style="text-align: center;"><b>Admin Login</b></h4>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-center mt-3 mb-4">
                <img src="../assets/images/avatar.png" class="border border-4 border-primary rounded-circle p-1 w-25" alt="" />
              </div>
              <div class="from-group my-3">
                <!-- <label for="auth"></label> -->
                <div class="input-group">
                  <span class="input-group-text" id="auth">
                    <i class="fas fa-user"></i>
                  </span>
                  <input type="text" class="form-control" id="auth" placeholder="Username" required />
                </div>
                <div class="mt-1">
                  <p class="text-danger">Invalid Email or Username!</p>
                </div>
              </div>
              <div class="from-group my-3">
                <!-- <label for="password"></label> -->
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-key"></i>
                  </span>
                  <input type="password" class="form-control" id="password" placeholder="Password" required />
                </div>
                <div class="mt-1">
                  <p class="text-danger">Invalid Password!</p>
                </div>
              </div>
              <div class="row d-flex align-items-center justify-content-between">
                <div class="col my-1">
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">Remember Me</label>
                    </div>
                  </div>
                </div>
                <div class="col my-2 text-end">
                  <a href="forget.php" >Forget Password?</a>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-outline-primary d-block w-100">
                <i class="fas fa-right-to-bracket"></i>
                <strong class="ps-1">LOGIN</strong>
              </button>
            </div>
          </div>
        </form>
    </section>
  </main>
</body>
</html>