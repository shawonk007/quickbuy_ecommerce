<?php

require __DIR__ . '/../../../vendor/autoload.php';

use App\Database;
use App\Class\Users;

$db = new Database();
$users = new Users($db->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  $id = $_POST['id'];
  $role = $_POST['role'];
  $status = $_POST['status'];
  if (empty($erros)) {
    try {
      if ($users->authorize($id, $role, $status)) {
        $response = [
          'success' => true,
          'message' => 'User updated successfully!'
        ];
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to update user.'
        ];
      }
    } catch (\Throwable $e) {
      $response = [
        'success' => false,
        'message' => 'An error occurred: '. $e->getMessage()
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