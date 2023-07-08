<?php

require __DIR__ . '/../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Class\Profile;
use App\Database;
use App\Class\Roles;
use App\Class\Users;
$db = new Database();
$roles = new Roles($db->conn);
$users = new Users($db->conn);

$pageName = "Edit User";
$pageGroup = "Users & Members";
$currentGroup = ["Users", "users/index.php"];
$currentPage = "Edit";
require __DIR__ . '/../../components/header.php';

$jsonData = file_get_contents(config("app.root") . 'assets/data/bangladesh.json');
$data = json_decode($jsonData, true);
$divisions = $data['divisions'];

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  try {
    $user = $users->edit($id);
    $profile = Profile::hasProfile($id, $db);
  } catch (Exception $e) {
    //throw $th;
  }
}
?>
<style>
  label strong {
    font-size: 0.85rem;
  }
</style>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid my-5">
      <form action="<?= config("app.root") ?>src/actions/users/authorize.php" method="post" enctype="multipart/form-data">
      <!-- <form action="" method="post" enctype="multipart/form-data"> -->
        <div class="row row-cols-3 row-cols-lg-5 g-3 g-lg-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-success py-1">
                <h5 class="card-title text-light py-0 my-0">Update User Data</h5>
              </div>
              <div class="card-body pt-0">
                <input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : '' ?>" />
                <div class="row g-3 pt-0 mt-0">
                  <div class="col pt-0 mt-3">
                    <label for="">
                      <strong>User Avatar</strong>
                    </label>
                    <img id="dummy" src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                  <div class="col pt-0 mt-3">
                    <div class="form-group">
                      <label for="fName">
                        <strong>First Name</strong>
                      </label>
                      <div class="input-group input-group-sm">
                        <input type="text" name="" class="form-control" id="dob" placeholder="" value="<?= isset($user['first_name']) ? $user['first_name'] : '' ?>" disabled />
                      </div>
                    </div>
                    <div class="form-group my-1">
                      <label for="lName">
                        <strong>Last Name</strong>
                      </label>
                      <div class="input-group input-group-sm">
                        <input type="text" name="" class="form-control" id="dob" placeholder="" value="<?= isset($user['last_name']) ? $user['last_name'] : '' ?>" disabled />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="uName">
                        <strong>Username</strong>
                      </label>
                      <div class="input-group input-group-sm">
                        <input type="text" name="" class="form-control" id="dob" placeholder="" value="<?= isset($user['username']) ? $user['username'] : '' ?>" disabled />
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="row g-2 mt-2">
                  <div class="col-4 d-flex align-items-center">
                    <label for="dob">
                      <strong>Date of Birth</strong>
                    </label>
                  </div>
                  <div class="col-8">
                    <div class="input-group input-group-sm">
                      <input type="date" name="" class="form-control" id="dob" placeholder="" value="<?= isset($profile['date_of_birth']) ? $profile['date_of_birth'] : '' ?>" disabled />
                    </div>
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="form-group my-2">
                  <label for="email">
                    <strong>Primary Email</strong>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <input type="email" name="" class="form-control" id="email" placeholder="someone@example.com" value="<?= isset($user['email_address']) ? $user['email_address'] : '' ?>" disabled />
                  </div>
                </div>
                <div class="form-group my-2">
                  <label for="altEmail">
                    <strong>Secondary Email</strong>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <input type="email" name="" class="form-control" id="altEmail" placeholder="someone@example.com" value="<?= isset($profile['alt_email_address']) ? $profile['alt_email_address'] : '' ?>" disabled />
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="phone">
                        <strong>Primary Phone</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="tel" name="" class="form-control" id="phone" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" value="<?= isset($user['cell_phone']) ? $user['cell_phone'] : '' ?>" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="altPhone">
                        <strong>Secondary Phone</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="tel" name="" class="form-control" id="altPhone" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" value="<?= isset($profile['alt_cell_phone']) ? $profile['alt_cell_phone'] : '' ?>" disabled />
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="row mt-3">
                  <div class="col-4 d-flex align-items-center">
                    <label for="dob">
                      <strong>Created at</strong>
                    </label>
                  </div>
                  <div class="col-8">
                    <div class="input-group input-group-sm">
                      <input type="datetime-local" name="" class="form-control" id="create" placeholder="" value="<?= isset($user['created_at']) ? $user['created_at'] : '' ?>" disabled />
                    </div>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-4 d-flex align-items-center">
                    <label for="dob">
                      <strong>Verified at</strong>
                    </label>
                  </div>
                  <div class="col-8">
                    <div class="input-group input-group-sm">
                      <input type="datetime-local" name="" class="form-control" id="verify" placeholder="" value="<?= isset($user['email_verified_at']) ? $user['email_verified_at'] : 'Not Verified Yet' ?>" disabled />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 d-flex align-items-center">
                    <label for="dob">
                      <strong>Last Updated</strong>
                    </label>
                  </div>
                  <div class="col-8">
                    <div class="input-group input-group-sm">
                      <input type="datetime-local" name="" class="form-control" id="verify" placeholder="" value="<?= isset($user['email_verified_at']) ? $user['email_verified_at'] : 'Not Verified Yet' ?>" disabled />
                    </div>
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="row g-2">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="role">
                        <strong>User Role</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="role" class="form-control" id="role">
                          <option value="">-- Choose Role --</option>
                          <?php $roleList = $roles->index();
                            foreach ($roleList as $role) {
                            if ($role['role_status'] == 1) {
                              $selected = ($user['role'] == $role['role_id']) ? 'selected' : ''; // Check if the current role matches the user-selected role
                            ?>
                            <option value="<?= $role['role_id'] ?>" <?= $selected ?>><?= $role['role_title'] ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="status">
                        <strong>User Status</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="status" class="form-control" id="status">
                          <option value="">-- Choose Status --</option>
                          <option value="1" <?= isset($user['user_status']) && $user['user_status'] == 1 ? 'selected' : ''; ?>>Enable</option>
                          <option value="0" <?= isset($user['user_status']) && $user['user_status'] == 0 ? 'selected' : ''; ?>>Disable</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row g-3">
                  <div class="col d-grid">
                    <a href="index.php" class="btn btn-secondary btn-sm rounded-pill py-2">
                      <i class="fas fa-arrow-left"></i>
                      <span class="ps-1">Previous</span>
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
              <div class="card-body pt-2">
                <div class="form-group">
                  <label for="biography">
                    <strong>Biography</strong>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <textarea name="" class="form-control" id="biography" cols="30" rows="24" placeholder="Type your details here" disabled ><?= isset($profile['user_biography']) ? $profile['user_biography'] : '' ?></textarea>
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="form-group mb-2">
                  <label for="">
                    <strong>Address</strong>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <textarea name="" class="form-control" id="" cols="30" rows="3" placeholder="Type your address here ..." disabled><?= isset($profile['user_address']) ? $profile['user_address'] : '' ?></textarea>
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="">
                        <strong>Division</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="" class="form-control" id="division" onchange="populateDistricts()" disabled >
                          <option value="">-- Choose One --</option>
                          <?php
                            // Populate the division dropdown select menu
                            foreach ($divisions as $division) {
                              echo '<option value="' . $division['name'] . '">' . $division['name'] . '</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="">
                        <strong>District</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="" class="form-control" id="district" disabled>
                          <option value="">-- Choose One --</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="postal">
                        <strong>Postal Code</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="text" name="" class="form-control" id="postal" placeholder="Postal Code" value="<?= isset($profile['postal_code']) ? $profile['postal_code'] : '' ?>" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="gender">
                        <strong>Gender</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="" class="form-control" id="gender" disabled >
                          <option value="">-- Choose One --</option>
                          <option value="1" <?= isset($profile['gender']) && $profile['gender'] == 1 ? 'selected' : ''; ?>>Male</option>
                          <option value="2" <?= isset($profile['gender']) && $profile['gender'] == 2 ? 'selected' : ''; ?>>Female</option>
                          <option value="3" <?= isset($profile['gender']) && $profile['gender'] == 3 ? 'selected' : ''; ?>>Others</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="religion">
                        <strong>Religion</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="" class="form-control" id="religion" disabled >
                          <option value="">-- Choose One --</option>
                          <option value="1" <?= isset($profile['religion']) && $profile['religion'] == 1 ? 'selected' : ''; ?>>Islam</option>
                          <option value="2" <?= isset($profile['religion']) && $profile['religion'] == 2 ? 'selected' : ''; ?>>Hinduism</option>
                          <option value="3" <?= isset($profile['religion']) && $profile['religion'] == 3 ? 'selected' : ''; ?>>Christians</option>
                          <option value="4" <?= isset($profile['religion']) && $profile['religion'] == 4 ? 'selected' : ''; ?>>Buddhist</option>
                          <option value="5" <?= isset($profile['religion']) && $profile['religion'] == 5 ? 'selected' : ''; ?>>Others</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="marital">
                        <strong>Marital Status</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="" class="form-control" id="marital" disabled >
                          <option value="">-- Choose One --</option>
                          <option value="1" <?= isset($profile['marital_status']) && $profile['marital_status'] == 1 ? 'selected' : ''; ?>>Single</option>
                          <option value="2" <?= isset($profile['marital_status']) && $profile['marital_status'] == 2 ? 'selected' : ''; ?>>Married</option>
                          <option value="3" <?= isset($profile['marital_status']) && $profile['marital_status'] == 3 ? 'selected' : ''; ?>>Unmarried</option>
                          <option value="4" <?= isset($profile['marital_status']) && $profile['marital_status'] == 4 ? 'selected' : ''; ?>>Engaged</option>
                          <option value="5" <?= isset($profile['marital_status']) && $profile['marital_status'] == 5 ? 'selected' : ''; ?>>Divorced</option>
                          <option value="6" <?= isset($profile['marital_status']) && $profile['marital_status'] == 6 ? 'selected' : ''; ?>>Separeted</option>
                          <option value="7" <?= isset($profile['marital_status']) && $profile['marital_status'] == 7 ? 'selected' : ''; ?>>Widowed</option>
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
    </section>
  </main>
  <script>
    $(document).ready(function() {
      $('form').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: '<?= config("app.root") ?>src/actions/users/authorize.php',
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
                window.location.href = 'index.php';
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
  </script>
  <script>
    // Store the divisions data in JavaScript variable
    var divisions = <?= json_encode($divisions); ?>;
  </script>
  <script>
    // $(document).ready(function() {
    //   $('#biography').summernote({
    //     height: 400, // Specify the height of the editor
    //     toolbar: [
    //       ['heading', ['style']],
    //       ['style', ['bold', 'italic', 'underline', 'clear']],
    //       ['text', ['fontname', 'fontsize', 'color']]
    //     ]
    //     toolbar: [
    //       ['style', ['bold', 'italic', 'underline', 'clear', 'style', ]],
    //       ['fontsize', ['fontname', 'fontsize',]],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']],
    //       ['insert', ['link', 'picture', 'video']],
    //       // ['view', ['codeview', 'help']]
    //     ],
    //     callbacks: {
    //       onChange: function(contents, $editable) {
    //         console.log('Content changed:', contents);
    //       }
    //     }
    //   });
    // });
  </script>
</body>
</html>