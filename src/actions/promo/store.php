<?php
require __DIR__ . '/../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
use App\Class\Promos;
$db = new Database();
$promos = new Promos($db->conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $code = $_POST['code'];
  $merchant = $_POST['merchant'];
  $desc = $_POST['description'];
  $start = $_POST['start'];
  $expire = $_POST['expire'];
  $ptype = $_POST['p_type'];
  $dtype = $_POST['d_type'];
  $discount = $_POST['discount'];
  $status = $_POST['status'];
  $note = $_POST['restriction'];
  if (empty($errors)) {
    try {
      if ($promos->create($merchant, $title, $code, $desc, $ptype, $dtype, $discount, $start, $expire, $status, $note)) {
        $response = [
          'success' => true,
          'message' => 'Promo created successfully.'
        ];
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to create promo.'
        ];
      }
    } catch (\Throwable $e) {
      $errorMessage = $e->getMessage();
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