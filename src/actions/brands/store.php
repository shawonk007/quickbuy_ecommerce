<?php
require __DIR__ . '/../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
use App\Class\Brands;
use App\Pathify;
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
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $slug = isset($_POST['slug']) ? Pathify::make($_POST['title']) : $_POST['slug'];
  $mark = isset($_POST['mark']) ? $_POST['mark'] : NULL;
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
  if ($brands->exists('brand_title', $title)) {
    $response = [
      'success' => false,
      'message' => 'Brand already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($brands->exists('brand_slug', $slug)) {
    $response = [
      'success' => false,
      'message' => 'Slug is not available.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($logo['error'] === UPLOAD_ERR_OK) {
    $uploadPath = __DIR__ . '/../../../uploads/brands/';
    if (!is_dir($uploadPath)) {
      mkdir($uploadPath, 0777, true);
    }
    $img = "QBB_" . time() . "_qb.jpg";
    $image = (new Image())->make($logo['tmp_name']);
    $image->encode('jpg', 80);
    $image->resize(300, null, function ($constraint) {
      $constraint->aspectRatio();
    });
    $image->save($uploadPath . $img);
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