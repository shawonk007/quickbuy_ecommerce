<?php require __DIR__ . '/../../../vendor/autoload.php';
use App\Database;
use App\Class\Roles;
use App\Pathify;
$db = new Database();
$roles = new Roles($db->conn);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $slug = Pathify::make($title);
  $status = $_POST['status'];
  if (empty($title)) {
    $response = [
      'success' => false,
      'message' => 'Title cannot be empty.',
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($roles->exists('role_title', $title)) {
    $response = [
      'success' => false,
      'message' => 'Role already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($roles->exists('role_slug', $title)) {
    $response = [
      'success' => false,
      'message' => 'Slug is not available.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
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
    $response = [
      'success' => false,
      'message' => 'An error occurred: ' . $e->getMessage()
    ];
  }
  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}