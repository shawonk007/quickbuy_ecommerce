<?php
require __DIR__ . '/../../../vendor/autoload.php';
use App\Database;
use App\Class\Category;
use App\Pathify;

$db = new Database();
$categories = new Category($db->conn);
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $parent = $_POST['parent'];
  $sub = $_POST['sub-parent'];
  // $slug = empty($slug) ? $_POST['slug'] : Pathify::make($title);
  $status = $_POST['status'];
  $mark = isset($_POST['mark']) ? $_POST['mark'] : NULL;
  if (empty($_POST['slug'])) {
    $slug = Pathify::make($title);
  } else {
    $slug = $_POST['slug'];
  }
  if (isset($sub) && $sub != NULL) {
    $cat = $sub;
  } else {
    $cat = $parent;
  }
  if (empty($title)) {
    $response = [
      'success' => false,
      'message' => 'Title cannot be empty.',
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($categories->exists('cat_title', $title)) {
    $response = [
      'success' => false,
      'message' => 'Category already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($categories->exists('cat_slug', $slug)) {
    $response = [
      'success' => false,
      'message' => 'Slug is not avaiable.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if (empty($errors)) {
    try {
      if ($categories->create($title, $desc, $cat, $slug, $status, $mark)) {
        $response = [
          'success' => true,
          'message' => 'Category created successfully.'
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
      'errors' => $errors
    ];
  }
  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}