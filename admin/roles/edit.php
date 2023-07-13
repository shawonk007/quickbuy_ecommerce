<?php
require __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Class\Roles;
use App\Database;

// Auth::initialize();

// if (!isset($_SESSION['login'])) {
//   if (!Auth::check() || !Auth::isAdmin()) {
//     header("Location: ../login.php");
//     exit();
//   }
// }

$db = new Database();
$roles = new Roles($db->conn);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  try {
    $role = $roles->edit($id);
  } catch (Exception $e) {
    // exit();
  }
}

$pageName = "Edit Role";
$pageGroup = "Users Settings";
$currentGroup = ["Roles", "roles/index.php"];
$currentPage = "Edit";

require __DIR__ . '/../../components/header.php';
?>
<body>
  <?php require __DIR__ . "/../../components/sidebar/admin.php" ?>
  <main id="content">
    <!-- SCROLL UP BUTTON -->
    <?php include __DIR__ . '/../../components/navigation/scroll-to-top.php' ?>
    <?php require __DIR__ . "/../../components/navbar/admin.php" ?>
    <?php include __DIR__ . '/../../components/breadcrumb/admin/secondary.php' ?>
    <section class="container-fluid my-5"></section>
    <section class="container-fluid d-flex align-items-center justify-content-center py-5 my-5">
      <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
        <form action="<?= config("app.root") ?>src/actions/roles/update.php" method="post" id="updateRole">
          <div class="card shadow">
            <div class="card-header bg-success py-1">
              <h4 class="card-title text-light py-0 my-0">Update Role</h4>
            </div>
            <div class="card-body">
              <input type="hidden" name="id" value="<?= isset($role['role_id']) ? $role['role_id'] : '' ?>" >
              <div class="row g-3">
                <div class="col-12">
                  <input type="text" name="title" class="form-control form-control-sm" id="" placeholder="Role Title" value="<?= isset($role['role_title']) ? $role['role_title'] : '' ?>" required />
                </div>
                <div class="col-12">
                  <textarea name="description" class="form-control form-control-sm" id="" cols="30" rows="8" placeholder="Type role details here ..."><?= isset($role['role_description']) ? $role['role_description'] : '' ?></textarea>
                </div>
                <div class="col-6">
                  <input type="text" name="slug" class="form-control form-control-sm" id="" placeholder="Role Slug" value="<?= isset($role['role_slug']) ? $role['role_slug'] : '' ?>" required />
                </div>
                <div class="col-6">
                  <select name="status" class="form-control form-control-sm" id="">
                    <option selected>-- Role Status --</option>
                    <option value="1" <?= isset($role['role_status']) && $role['role_status'] == 1 ? 'selected' : ''; ?>>Enable</option>
                    <option value="0" <?= isset($role['role_status']) && $role['role_status'] == 0 ? 'selected' : ''; ?>>Disable</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col d-grid">
                  <a href="index.php" class="btn btn-secondary rounded-pill">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ps-1">Previous</span>
                  </a>
                </div>
                <div class="col d-grid">
                  <button type="submit" class="btn btn-success rounded-pill">
                    <i class="fas fa-check"></i>
                    <span class="ps-1">Update</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
  <script>
    $(document).ready(function() {
      $('#updateRole').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: '<?= config("app.root") ?>src/actions/roles/update.php',
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
</body>
</html>