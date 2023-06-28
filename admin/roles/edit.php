<?php
require __DIR__ . '../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Class\Roles;
use App\Database;
$db = new Database();
$roles = new Roles($db->conn);
$pageName = "Edit Role";
$pageGroup = "Users Settings";
$currentGroup = ["Roles", "roles/index.php"];
$currentPage = "Edit";
require __DIR__ . '/../../components/header.php';

$errors = [];
function logError($errorMessage) {
  global $pageName;
  $logFile = __DIR__ . '/errors.log'; // Specify the log file name and path
  $logMessage = '['. date('Y-m-d H:i:s A') . ']' . ' | ' . 'ERROR from ' . $pageName . $errorMessage . PHP_EOL ;
  file_put_contents($logFile, $logMessage, FILE_APPEND);
  logError($logMessage); // Call the logError function recursively
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  try {
    $role = $roles->edit($id);
  } catch (Exception $e) {
    // exit();
  }
}
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
            <div class="card-header bg-success pb-0">
              <h4 class="card-title text-light">Update Role</h4>
            </div>
            <div class="card-body">
              <input type="hidden" name="id" value="<?= isset($role['role_id']) ? $role['role_id'] : '' ?>" >
              <div class="row g-3 mb-3">
                <div class="input-group">
                  <input type="text" name="title" class="form-control" id="" placeholder="Role Title" value="<?= isset($role['role_title']) ? $role['role_title'] : '' ?>" required />
                </div>
                <div class="input-group">
                  <textarea name="description" class="form-control" id="" cols="30" rows="8" placeholder="Type role details here ..."><?= isset($role['role_description']) ? $role['role_description'] : '' ?></textarea>
                </div>
              </div>
              <div class="row g-3">
                <div class="col-6">
                  <div class="input-group">
                    <input type="text" name="slug" class="form-control" id="" placeholder="Role Slug" value="<?= isset($role['role_slug']) ? $role['role_slug'] : '' ?>" required />
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <select name="status" class="form-control" id="">
                      <option selected>-- Role Status --</option>
                      <option value="1" <?= isset($role['role_status']) && $role['role_status'] == 1 ? 'selected' : ''; ?>>Enable</option>
                      <option value="0" <?= isset($role['role_status']) && $role['role_status'] == 0 ? 'selected' : ''; ?>>Disable</option>
                    </select>
                  </div>
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