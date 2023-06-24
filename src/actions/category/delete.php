<?php
require __DIR__ . '../../../../vendor/autoload.php';
use App\Database;
use App\Class\Category;
$db = new Database();
$categories = new Category($db->conn);
if (isset($_POST['id'])) {
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $catId = $_POST['id'];
  header('Content-Type: application/json');
  $result = $categories->destroy($catId);
  echo json_encode($result);
  exit();
}