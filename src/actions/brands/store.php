<?php
require __DIR__ . '../../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
use App\Class\Brands;
use Intervention\Image\ImageManager as Image;
$db = new Database();
$brands = new Brands($db->conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $logo = $_FILES['logo'];
  $ext = ['jpg', 'jpeg', 'png', 'svg'];
  $size = 1 * 1024 * 1024;
  $fileExt = strtolower(pathinfo($logo['name'], PATHINFO_EXTENSION));
  $fileSize = $logo['size'];
  if (!in_array($fileExt, $ext) || $fileSize > $size) {
    $response = [
      'success' => false,
      'message' => 'Invalid file type or size. Please upload a JPG, JPEG, PNG, or SVG file up to 1 MB in size.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  $title = $db->conn->escape_string($_POST['title']);
  $desc = $db->conn->escape_string($_POST['desc']);
  $slug = $db->conn->escape_string($_POST['slug']);
  $mark = isset($_POST['mark']) ? $_POST['mark'] : NULL;
  $status = $_POST['status'];
  $errors = [];
  if (empty($title)) {
    $errors[] = 'title';
  }
  if (empty($slug)) {
    $errors[] = 'slug';
  }
  if (!empty($errors)) {
    $response = [
      'success' => false,
      'message' => 'Field(s) cannot be empty.',
      'errors' => $errors
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($logo['error'] === UPLOAD_ERR_OK) {
    $img = "QBB_" . time() . "_qb.jpg";
    $image = (new Image())->make($logo['tmp_name']);
    $image->encode('jpg', 80);
    $image->fit(300, 300);
    $image->save(__DIR__ . '/../../../uploads/brands/' . $img);
    if (empty($errors)) {
      try {
        if ($brands->create($title, $desc, $img, $slug, $status, $mark)) {
          $response = [
            'success' => true,
            'message' => 'Brand created successfully!'
          ];
        } else {
          $response = [
            'success' => false,
            'message' => 'Failed to create category.'
          ];
        }
      } catch (\Throwable $e) {
        $response = [
          'success' => false,
          'message' => 'An error occurred: ' . $e->getMessage()
        ];
      }
    } else {
      $response = [
        'success' => false,
        'message' => 'Validation error',
        'error' => $errors
      ];
    }
  } else {
    $response = [
      'success' => false,
      'message' => 'File upload failed.'
    ];
  }
  header("Content-Type: application/json");
  echo json_encode($response);
  exit();
}
?>