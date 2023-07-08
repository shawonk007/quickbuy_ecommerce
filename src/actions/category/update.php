<?php
require __DIR__ . '/../../../vendor/autoload.php';
use App\Database;
use App\Class\Category;
use App\Pathify;
$db = new Database();
$categories = new Category($db->conn);
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $parent = $_POST['parent'];
  $sub = $_POST['sub-parent'];
  $slug = isset($_POST['slug']) ? $_POST['slug'] : Pathify::make($_POST['title']);
  $status = $_POST['status'];
  $mark = isset($_POST['mark']) ? $_POST['mark'] : NULL;
  $cat = $parent . ' , ' . $sub;
  if (empty($title)) {
    $errors[] = "Category title is required";
  }
  if (empty($slug)) {
    $errors[] = "Category slug is required";
  }
  if (empty($errors)) {
    try {
      if ($categories->update($id, $title, $desc, $cat, $slug, $status, $mark)) {
        $response = [
          'success' => true,
          'message' => 'Category updated successfully.'
        ];
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to update category.'
        ];
      }
    } catch (\Throwable $e) {
      // $errorMessage = $e->getMessage();
    //   logError($errorMessage);
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