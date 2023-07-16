<?php
require __DIR__ . '/vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Auth;
use App\Database;
$db = new Database();

$userId = $_SESSION['user']['id'];
$data = Auth::getUserById($userId);
$profile = Auth::getProfile($userId);

// $pageName = "Dashboard < {$data['first_name']} {$data['last_name']}";
$pageName = "Dashboard";
$pageGroup = "Dashboard";
$currentPage = "Dashboard";
require __DIR__ . '/components/header.php';
?>
<body>
  <?php require __DIR__ . "/components/sidebar/customer.php" ?>
  <main id="content" class="bg-body-tertiary" >
    <?php require __DIR__ . "/components/navbar/customer.php" ?>
    <?php require __DIR__ . "/components/breadcrumb/customer/primary.php" ?>
    <!-- YOUR CONTENT STARTS FROM HERE -->
    <section class="container-fluid my-5">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Basic</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane" type="button" role="tab" aria-controls="about-tab-pane" aria-selected="false">About</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
        </li>
      </ul>
    </section>
    <section class="container-fluid tab-content my-5" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-header bg-primary py-1">
            <h4 class="card-title text-white py-0 my-0">Basic Informations</h4>
          </div>
          <div class="card-body py-5">
            <?= $_SESSION['login'] ?>
            <div class="row g-5 ps-lg-4 pe-lg-4">
              <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
                <img src="<?= config("app.root") ?>assets/images/dummy-square.jpg" class="w-100 rounded-circle" alt="" />
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row" class="pt-0 pb-3" >Name of User</th>
                      <td class="pt-0 pb-3" >:</td>
                      <td class="pt-0 pb-3" >
                        <strong><?= isset($data['first_name']) && isset($data['last_name']) ? $data['first_name'] . " " . $data['last_name'] : " " ?></strong>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-3" >Username</th>
                      <td class="py-3" >:</td>
                      <td class="py-3" ><?= isset($data['username']) ? $data['username'] : " "  ?></td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-3" >Date of Birth</th>
                      <td class="py-3" >:</td>
                      <td class="py-3" ><?= isset($profile['date_of_birth']) ? $profile['date_of_birth'] : " "  ?></td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-3" >Gender</th>
                      <td class="py-3" >:</td>
                      <td class="py-3" ><?= isset($profile['gender']) ? $profile['gender'] : " "  ?></td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-3" >Religion</th>
                      <td class="py-3" >:</td>
                      <td class="py-3" ><?= isset($profile['religion']) ? $profile['religion'] : " "  ?></td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-3" >Marital Status</th>
                      <td class="py-3" >:</td>
                      <td class="py-3" ><?= isset($profile['marital_status']) ? $profile['marital_status'] : " "  ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-header bg-primary py-1">
            <h4 class="card-title text-white py-0 my-0">About Myself</h4>
          </div>
          <div class="card-body py-5">
          <div class="row g-5 ps-lg-4 pe-lg-4">
              <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
                <img src="<?= config("app.root") ?>assets/images/dummy-square.jpg" class="w-100 rounded-circle" alt="" />
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="pt-0 pb-3">Biography</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="pt-0 pb-3" >
                        <p><?= isset($profile['user_biography']) ? $profile['user_biography'] : " "  ?></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <div class="card shadow">
          <div class="card-header bg-primary py-1">
            <h4 class="card-title text-white py-0 my-0">Contact Informations</h4>
          </div>
          <div class="card-body py-5">
          <div class="row g-5 ps-lg-4 pe-lg-4">
              <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
                <img src="<?= config("app.root") ?>assets/images/dummy-square.jpg" class="w-100 rounded-circle" alt="" />
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
                <table class="table">
                  <tbody>
                    <tr>
                      <th rowspan="5" scope="row" class="pt-0 pb-2" >Current Address</th>
                      <td rowspan="5" class="pt-0 pb-2" >:</td>
                    </tr>
                    <tr>
                      <td class="pt-0 pb-2" ><?= isset($profile['user_address']) ? $profile['user_address'] : " "  ?></td>
                    </tr>
                    <tr>
                      <td class="py-2" >
                        <strong>Division</strong>
                        <span><?= isset($profile['user_division']) ? $profile['user_division'] : " "  ?></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2" >
                        <strong>District</strong>
                        <span><?= isset($profile['user_division']) ? $profile['user_division'] : " "  ?></span>
                      </td>
                    </tr>
                    <tr>
                      <td class="py-2" >
                        <strong>Postal Code</strong>
                        <span><?= isset($profile['postal_code']) ? $profile['postal_code'] : " "  ?></span>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-2" >Primary Email</th>
                      <td class="py-2" >:</td>
                      <td class="py-2" ><?= isset($data['email_address']) ? $data['email_address'] : " "  ?></td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-2" >Secondary Email</th>
                      <td class="py-2" >:</td>
                      <td class="py-2" ><?= isset($profile['alt_email_address']) ? $profile['alt_email_address'] : " "  ?></td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-2" >Primary Phone</th>
                      <td class="py-2" >:</td>
                      <td class="py-2" ><?= isset($data['cell_phone']) ? $data['cell_phone'] : " "  ?></td>
                    </tr>
                    <tr>
                      <th scope="row" class="py-2" >Secondary Phone</th>
                      <td class="py-2" >:</td>
                      <td class="py-2" ><?= isset($profile['alt_cell_phone']) ? $profile['alt_cell_phone'] : " "  ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid my-5">
      <a href="<?= config("app.root") ?>profile.php" class="btn btn-primary">
        <i class="fas fa-user-edit"></i>
        <span class="ps-2">Edit Profile</span>
      </a>
      <button type="submit" class="btn btn-danger" onclick="deleteAccount(<?= $_SESSION['user']['id'] ?>)" >
        <i class="fas fa-trash-alt"></i>
        <span class="ps-2">Delete Account</span>
      </button>
    </section>
  </main>
  <script>
    function deleteAccount($userId) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            // url: '<?= config("app.root")?>src/actions/roles/delete.php',
            type: 'POST',
            data: { id: userId },
            success: function(response) {
              console.log(response);
              Swal.fire({
                title: 'Deleted!',
                text: 'Account has been deleted',
                icon: 'success'
              }).then(() => {
                window.location.href = auth/login.php;
              });
            },
            error: function() {
              Swal.fire({
                title: 'Error',
                text: 'An error occurred while deleting your account.',
                icon: 'error'
              });
            }
          });
        }
      });
    }
  </script>
</body>
</html>