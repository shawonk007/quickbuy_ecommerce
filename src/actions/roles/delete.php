<?php
require __DIR__ . '/../../../vendor/autoload.php';
use App\Database;
use App\Class\Roles;
$db = new Database();
$roles = new Roles($db->conn);
if (isset($_POST['id'])) {
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $roleId = $_POST['id'];
  header('Content-Type: application/json');
  $result = $roles->destroy($roleId);
  echo json_encode($result);
  exit();
}