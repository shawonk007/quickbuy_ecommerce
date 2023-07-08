<?php

require __DIR__ . '/../../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Auth;
use App\Database;
$db = new Database();

$root = config("app.root");
$admin = config("app.admin");
$merchant = config("app.merchant");

Auth::initialize();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $auth = $_POST['auth'];
  $pass = $_POST['password'];
  try {
    if (Auth::isAuthenticated($auth, $pass)) {
      $_SESSION['login'] = true;
      $_SESSION['user'] = Auth::getUser();
      if (Auth::isAdmin()) {
        $redirect = "{$admin}dashboard.php";
      } elseif (Auth::isMerchant()) {
        $redirect = "{$merchant}welcome.php";
      } else {
        // $redirect = "{$root}/$uname/home.php";
        $redirect = "{$root}dashboard.php";
      }
      $response = [
        'success' => true,
        'message' => 'Login Successfull!',
        'redirect' => $redirect
      ];
      // header("Location: $redirect");
      // exit();
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