<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Auth;
use App\Database;
$db = new Database();

Auth::initialize();

if (!isset($_SESSION['login'])) {
  if (!Auth::check() || !Auth::isCustomer()) {
    header("Location: auth/login.php");
    exit();
  }
}

$jsonData = file_get_contents(config("app.root") . 'assets/data/bangladesh.json');
$data = json_decode($jsonData, true);
$divisions = $data['divisions'];

$userId = $_SESSION['user']['id'];
$data = Auth::getUserById($userId);
$profile = Auth::getProfile($userId);

$pageName = "Edit Profile < {$data['first_name']} {$data['last_name']}";
$pageGroup = "User Profile";
$currentPage = "Profile";

require __DIR__ . '/components/header.php';
?>
<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content" class="bg-body-tertiary" >
    <?php require __DIR__ . "/components/navbar/customer.php" ?>
    <?php require __DIR__ . "/components/breadcrumb/customer/primary.php" ?>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="container-fluid my-5">
      <form action="<?= config("app.root") ?>src/actions/users/update.php" method="post" enctype="multipart/form-data">
        <div class="row row-cols-3 row-cols-lg-5 g-3 g-lg-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-success py-1">
                <h5 class="card-title text-light py-0 my-0">Edit Profile</h5>
              </div>
              <div class="card-body pt-0">
                <input type="hidden" name="user" value="<?= isset($data['id']) ? $data['id'] : " "  ?>">
                <div class="row g-3 pt-0 mt-0">
                  <div class="col-6">    
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light h-100" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-1">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD 2MB)</span><br/>
                          <span>(MIN. RES. 300X300)</span>
                        </p>
                      </div>
                      <input type="file" name="avatar" class="d-none" id="imageInput" accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col-6">
                    <img id="dummy" src="assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                  <div class="col-12">
                    <hr class="py-0 my-0">
                  </div>
                  <div class="col-12">
                    <div class="input-group input-group-sm">
                      <input type="text" name="fname" class="form-control" id="fName" value="<?= isset($data['first_name']) ? $data['first_name'] : " "  ?>" placeholder="First Name" />
                      <input type="text" name="lname" class="form-control" id="lName" value="<?= isset($data['last_name']) ? $data['last_name'] : " "  ?>" placeholder="Last Name" />
                    </div>
                  </div>
                  <div class="col-6">
                    <input type="text" name="uname" class="form-control form-control-sm" id="uName" value="<?= isset($data['username']) ? $data['username'] : " "  ?>" placeholder="Username" />
                  </div>
                  <div class="col-6">
                    <input type="date" name="dob" class="form-control form-control-sm" id="dob" placeholder="" />
                  </div>
                  <div class="col-12">
                    <hr class="py-0 my-0">
                  </div>
                  <div class="col-12">
                    <input type="email" name="email" class="form-control form-control-sm" id="email" value="<?= isset($data['email_address']) ? $data['email_address'] : " "  ?>" placeholder="someone@example.com" />
                  </div>
                  <div class="col-12">
                    <input type="email" name="alt_email" class="form-control form-control-sm" id="altEmail" placeholder="someone@example.com" />
                  </div>
                  <div class="col-6">
                    <input type="tel" name="phone" class="form-control form-control-sm" id="phone" value="<?= isset($data['cell_phone']) ? $data['cell_phone'] : " "  ?>" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                  </div>
                  <div class="col-6">
                    <input type="tel" name="alt_phone" class="form-control form-control-sm" id="altPhone" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                  </div>
                  <div class="col-12">
                    <hr class="py-0 my-0">
                  </div>
                  <div class="col-4 d-flex align-items-center">
                    <small class="py-0 m-0"><b>Created At :</b></small>
                  </div>
                  <div class="col-8">
                    <input type="datetime-local" name="" class="form-control form-control-sm" id="created" value="<?= isset($data['created_at']) ? $data['created_at'] : " "  ?>" disabled />
                  </div>
                  <div class="col-4 d-flex align-items-center">
                    <small class="py-0 m-0"><b>Verified At :</b></small>
                  </div>
                  <div class="col-8">
                    <input type="<?= isset($data['email_verified_at']) && $data['email_verified_at'] != NULL ? 'datetime-local' : 'text'  ?>" name="" class="form-control form-control-sm" id="verified" value="<?= isset($data['email_verified_at']) ? $data['email_verified_at'] : "Not Verified Yet"  ?>" disabled />
                  </div>
                  <div class="col-4 d-flex align-items-center">
                    <small class="py-0 m-0"><b>Last Updated :</b></small>
                  </div>
                  <div class="col-8">
                    <input type="datetime-local" name="" class="form-control form-control-sm" id="updated" value="<?= isset($data['updated_at']) ? $data['updated_at'] : " "  ?>" disabled />
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col d-grid">
                    <a href="<?= config("app.root") ?>dashboard.php" class="btn btn-secondary btn-sm rounded-pill py-2">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">Discard</span>
                    </a>
                  </div>
                  <div class="col d-grid">
                    <button type="submit" class="btn btn-success btn-sm rounded-pill py-2">
                      <i class="fas fa-check"></i>
                      <span class="ps-1">Update</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
            <div class="card shadow">
              <div class="card-body pt-3">
                <div class="row g-3">
                  <div class="col-12">
                    <div class="input-group input-group-sm">
                      <textarea name="biography" class="form-control" id="biography" cols="30" rows="21" placeholder="Type your details here"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <hr class="py-0 my-0">
                  </div>
                  <div class="col-12">
                    <div class="input-group input-group-sm">
                      <textarea name="address" class="form-control" id="" cols="30" rows="3" placeholder="Type your address here ..."></textarea>
                    </div>
                  </div>
                  <div class="col-4">
                    <select name="division" class="form-control form-control-sm" id="division" onchange="populateDistricts()" >
                      <option value="">-- Division --</option>
                      <?php foreach ($divisions as $division) { ?>
                        <option value="<?= $division['name']?>"><?= $division['name']?></option>;
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-4">
                    <select name="district" class="form-control form-control-sm" id="district">
                      <option value="">-- District --</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <input type="text" name="postal" class="form-control form-control-sm" id="" placeholder="Postal Code" />
                  </div>
                  <div class="col-12">
                    <hr class="py-0 my-0">
                  </div>
                  <div class="col-4">
                    <select name="gender" class="form-control form-control-sm" id="">
                      <option value="">-- Gender --</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Others</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select name="religion" class="form-control form-control-sm" id="">
                      <option value="">-- Religion --</option>
                      <option value="1">Islam</option>
                      <option value="2">Hinduism</option>
                      <option value="3">Christians</option>
                      <option value="4">Buddhist</option>
                      <option value="5">Others</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select name="marital" class="form-control form-control-sm" id="">
                      <option value="">-- Marital Status --</option>
                      <option value="1">Single</option>
                      <option value="2">Married</option>
                      <option value="3">Unmarried</option>
                      <option value="4">Engaged</option>
                      <option value="5">Divorced</option>
                      <option value="6">Separeted</option>
                      <option value="7">Widowed</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
  <!-- <script>
    $(document).ready(function() {
      $('form').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: '<?= config("app.root") ?>src/actions/users/update.php',
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          success: function(response) {
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Updated',
                text: response.message,
                timer: 2000,
                showConfirmButton: false
              }).then(function() {
                location.reload();
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                timer: 2000,
                showConfirmButton: false
              });
            }
          },
          error: function(xhr, status, error) {
            if (xhr.status === 400) {
              // Bad request error
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Bad request. Please check your form data.',
                timer: 2000,
                showConfirmButton: false
              });
            } else if (xhr.status === 500) {
              // Internal server error
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Internal server error. Please try again later.',
                timer: 2000,
                showConfirmButton: false
              });
            } else {
              // Other errors
              console.error(error);
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while processing the request.',
                timer: 2000,
                showConfirmButton: false
              });
            }
          }
        });
      });
    });
  </script> -->
  <script>
    var imgInp = document.getElementById("imageInput");
    var dummy = document.getElementById("dummy");
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        dummy.src = URL.createObjectURL(file)
      }
    }
    var divisions = <?= json_encode($divisions); ?>;
  </script>
</body>
</html>