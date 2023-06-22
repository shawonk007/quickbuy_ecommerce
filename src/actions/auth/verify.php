<?php

require __DIR__ . '../../../../vendor/autoload.php';

use App\Database;
use App\Auth;
$db = new Database();
$user = new Auth($db->conn);

$root = config("app.root");
$admin = config("app.admin");
$merchant = config("app.merchant");

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $auth = $_POST['auth'];
  $pass = $_POST['password'];
  try {
    if ($user->isAuthenticated($auth, $pass)) {
      $_SESSION['login'] = true;
      if (Auth::isAdmin()) {
        // echo "Admin";
        $redirect = "{$admin}dashboard.php";
      } elseif (Auth::isMerchant()) {
        // echo "Merchant";
        $redirect = "{$merchant}welcome.php";
      } else {
        // echo "Customer";
        $redirect = "{$root}home.php";
      }
      $response = [
        'success' => true,
        'message' => 'Login Successfull!',
        'redirect' => $redirect
      ];
    } else {
      $response = [
        'success' => false,
        'message' => 'Failed to Login.'
      ];
    }
  } catch (\Throwable $e) {
    $errorMessage = $e->getMessage();
    $response = [
      'success' => false,
      'message' => 'An error occurred: ' . $e->getMessage()
    ];
  }

  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}