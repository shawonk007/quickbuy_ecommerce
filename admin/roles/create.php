<?php

use App\Class\Roles;

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$pageName = "Add New Role";
$pageGroup = "Users Settings";
$currentGroup = ["Roles", "roles/index.php"];
$currentPage = "Create";
require __DIR__ . '/../../components/header/tertiary.php';
require __DIR__ . '../../../vendor/autoload.php';

$roles = new Roles($conn);

$errors = [];

function logError($errorMessage) {
  global $pageName;
  $logFile = __DIR__ . '/errors.log'; // Specify the log file name and path
  $logMessage = '['. date('Y-m-d H:i:s A') . ']' . ' | ' . 'ERROR from ' . $pageName . $errorMessage . PHP_EOL ;
  file_put_contents($logFile, $logMessage, FILE_APPEND);
  logError($logMessage); // Call the logError function recursively
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $slug = $_POST['slug'];
  $status = $_POST['status'];

  if (empty($title)) {
    $errors[] = "Role title is required.";
  }

  if (empty($slug)) {
    $errors[] = "Role slug is required.";
  }

  if (empty($errors)) {
    try {
      if ($roles->create($title, $desc, $slug, $status)) {
        $response = [
          'success' => true,
          'message' => 'Role created successfully.'
        ];
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to create role.'
        ];
      }
    } catch (\Throwable $e) {
      $errorMessage = $e->getMessage();
      logError($errorMessage);
      $response = [
        'success' => false,
        'message' => 'An error occurred: ' . $e->getMessage()
      ];
    }
  } else {
    $response = [
      'success' => false,
      'message' => 'Validation error',
      'errors' => $errors
    ];
  }
  // Send the AJAX response as JSON
  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
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
        <form action="" method="post">
          <div class="card shadow">
            <div class="card-header bg-primary pb-0">
              <h4 class="card-title text-light">Create New Role</h4>
            </div>
            <div class="card-body">
              <div class="row g-3 mb-3">
                <div class="input-group">
                  <input type="text" name="title" class="form-control" id="" placeholder="Role Title" required />
                </div>
                <div class="input-group">
                  <textarea name="description" class="form-control" id="" cols="30" rows="8" placeholder="Type role details here ..."></textarea>
                </div>
              </div>
              <div class="row g-3">
                <div class="col-6">
                  <div class="input-group">
                    <input type="text" name="slug" class="form-control" id="" placeholder="Role Slug" required />
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group">
                    <select name="status" class="form-control" id="">
                      <option selected>-- Role Status --</option>
                      <option value="1">Enable</option>
                      <option value="0">Disable</option>
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
                  <button type="submit" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus"></i>
                    <span class="ps-1">Create New</span>
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
      $('form').submit(function(e) {
        e.preventDefault();
        // Perform AJAX request
        $.ajax({
          url: '',
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          success: function(response) {
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
</body>
</html>