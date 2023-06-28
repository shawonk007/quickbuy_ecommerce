<?php

require __DIR__ . '../../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Database;
use App\Class\Roles;
$db = new Database();
$roles = new Roles($db->conn);

$pageName = "Add New User";
$pageGroup = "Users & Members";
$currentGroup = ["Users", "users/index.php"];
$currentPage = "Create";
require __DIR__ . '/../../components/header.php';

$jsonData = file_get_contents(config("app.root") . 'assets/data/bangladesh.json');
$data = json_decode($jsonData, true);
$divisions = $data['divisions'];
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
      <form action="<?= config("app.root") ?>src/actions/users/store.php" method="post" enctype="multipart/form-data">
      <!-- <form action="" method="post" enctype="multipart/form-data"> -->
        <div class="row row-cols-3 row-cols-lg-5 g-3 g-lg-3">
          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
            <div class="card shadow">
              <div class="card-header bg-primary pb-0">
                <h5 class="card-title text-light">Create New User</h5>
              </div>
              <div class="card-body pt-2">
                <label for="">
                  <strong>User Avatar</strong>
                </label>
                <div class="row g-2 pt-0 mt-0">
                  <div class="col">    
                    <label for="imageInput" class="d-flex flex-column align-items-center justify-content-center bg-light" style="border: 3px solid lightgray; border-style: dashed;">
                      <div class="d-flex flex-column align-items-center justify-content-center py-1 h-100">
                        <h1 class="mb-0"><i class="fas fa-cloud-arrow-up"></i></h1>
                        <h6 class="my-1 text-dark text-center"><strong>Click to upload</strong></h6>
                        <p class="mb-2 text-dark text-center" style="font-size: 0.75rem;">
                          <span>PNG, WEBP, JPG or JPEG</span><br />
                          <span>(MAX. UPLOAD 2MB)</span><br/>
                          <span>(MIN. RES. 300X300)</span>
                        </p>
                      </div>
                      <input type="file" name="avatar" class="d-none" id="imageInput" required accept="image/*;capture=camera" />
                    </label>
                  </div>
                  <div class="col">
                    <img id="dummy" src="../../assets/images/dummy-square.jpg" class="w-100" alt="" />
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="form-group mb-2">
                  <label for="fName">
                    <strong>Name of User</strong>
                    <span class="text-danger">*</span>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <input type="text" name="fname" class="form-control" id="fName" placeholder="First Name" required />
                    <input type="text" name="lname" class="form-control" id="lName" placeholder="Last Name" required />
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col">
                    <div class="form-group">
                      <label for="uName">
                        <strong>Username</strong>
                        <span class="text-danger">*</span>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="text" name="uname" class="form-control" id="uName" placeholder="Username" required />
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="dob">
                        <strong>Date of Birth</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="date" name="dob" class="form-control" id="dob" placeholder="" />
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="form-group my-2">
                  <label for="email">
                    <strong>Primary Email</strong>
                    <span class="text-danger">*</span>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com" required />
                  </div>
                </div>
                <div class="form-group my-2">
                  <label for="altEmail">
                    <strong>Secondary Email</strong>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <input type="email" name="altEmail" class="form-control" id="altEmail" placeholder="someone@example.com" />
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="row g-2">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="phone">
                        <strong>Primary Phone</strong>
                        <span class="text-danger">*</span>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="altPhone">
                        <strong>Secondary Phone</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="tel" name="altPhone" class="form-control" id="altPhone" placeholder="+88 (01X) XX-XXXXXX" oninput="formatPhoneNumber(this)" maxlength="19" />
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="pass">
                        <strong>Passoword</strong>
                        <span class="text-danger">*</span>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="password" name="password" class="form-control" id="pass" placeholder="Password" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="cPass">
                        <strong>Confirm Password</strong>
                        <span class="text-danger">*</span>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="password" name="c_password" class="form-control" id="cPass" placeholder="Confirm Password" required />
                      </div>
                    </div>
                  </div>
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
                              if ($role['role_status'] == 1) { ?>
                                <option value="<?= $role['role_id'] ?>"><?= $role['role_title'] ?></option>
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
                          <option value="1">Enable</option>
                          <option value="0">Disable</option>
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
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill py-2">
                      <i class="fas fa-plus"></i>
                      <span class="ps-1">Create New</span>
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
                    <textarea name="biography" class="form-control" id="biography" cols="30" rows="24" placeholder="Type your details here"></textarea>
                  </div>
                </div>
                <hr class="py-0 mt-3 mb-2">
                <div class="form-group mb-2">
                  <label for="">
                    <strong>Address</strong>
                  </label>
                  <div class="input-group input-group-sm mt-1">
                    <textarea name="address" class="form-control" id="" cols="30" rows="3" placeholder="Type your address here ..."></textarea>
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="">
                        <strong>Division</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="division" class="form-control" id="division" onchange="populateDistricts()" >
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
                        <select name="district" class="form-control" id="district">
                          <option value="">-- Choose One --</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="">
                        <strong>Postal Code</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="text" name="postal" class="form-control" id="" placeholder="Postal Code" />
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="">
                        <strong>Gender</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="gender" class="form-control" id="">
                          <option value="">-- Choose One --</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                          <option value="3">Others</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="">
                        <strong>Religion</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="religion" class="form-control" id="">
                          <option value="">-- Choose One --</option>
                          <option value="1">Islam</option>
                          <option value="2">Hinduism</option>
                          <option value="3">Christians</option>
                          <option value="4">Buddhist</option>
                          <option value="5">Others</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-group">
                      <label for="">
                        <strong>Marital Status</strong>
                      </label>
                      <div class="input-group input-group-sm mt-1">
                        <select name="marital" class="form-control" id="">
                          <option value="">-- Choose One --</option>
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
          url: '<?= config("app.root") ?>src/actions/users/store.php',
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          success: function(response) {
            console.log(response);
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Created',
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