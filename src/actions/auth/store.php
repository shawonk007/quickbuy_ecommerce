<?php
require __DIR__ . '../../../../vendor/autoload.php';
use App\Database;
use App\Register;
$db = new Database();
$user = new Register($db->conn);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  $role = $_POST['role'];

  // if (empty($fname)) {
  //   $_SESSION['fname'] = "Firstname is required";
  // }
  // if (empty($lname)) {
  //   $_SESSION['lname'] = "Lastname is required";
  // }
  // if (empty($uname)) {
  //   $_SESSION['uname'] = "Username is required";
  // }
  // if (empty($email)) {
  //   $_SESSION['email'] = "Email address is required";
  // }
  // if (empty($phone)) {
  //   $_SESSION['phone'] = "Phone number is required";
  // }
  // if (empty($pass1 || $pass2)) {
  //   $_SESSION['pass'] = "Password not matched";
  // }

  if ($pass1 == $pass2) {
    $pass = password_hash($pass1, PASSWORD_DEFAULT);
    try {
      if ($user->create($fname, $lname, $uname, $email, $phone, $pass, $role)) {
        $response = [
          'success' => true,
          'message' => 'Registration successfull!.'
        ];
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to registration.'
        ];
      }
    } catch (\Throwable $e) {
      $errorMessage = $e->getMessage();
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