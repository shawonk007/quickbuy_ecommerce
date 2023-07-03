<?php
require __DIR__ . '/../../../vendor/autoload.php';

use App\Database;
use App\Class\Users;

$db = new Database();
$users = new Users($db->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $userId = $_POST['id'];
  header('Content-Type: application/json');
  $result = $users->destroy($userId);
  echo json_encode($result);
  exit();
}