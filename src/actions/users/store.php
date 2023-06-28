<?php
require __DIR__ . '../../../../vendor/autoload.php';

use App\Database;
use App\Class\Users;
use App\Class\Profile;
use Intervention\Image\ImageManagerStatic as Image;
$db = new Database();
$users = new Users($db->conn);

$jsonData = file_get_contents(config("app.root") . 'assets/data/bangladesh.json');
$data = json_decode($jsonData, true);
$divisions = $data['divisions'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $avatar = $_FILES['avatar'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $uname = $_POST['uname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $altEmail = $_POST['altEmail'];
  $phone = $_POST['phone'];
  $altPhone = $_POST['altPhone'];
  $pass1 = $_POST['password'];
  $pass2 = $_POST['c_password'];
  $role = $_POST['role'];
  $status = $_POST['status'];
  $bio = $_POST['biography'];
  $address = $_POST['address'];
  $selectedDivision = $_POST['division'];
  $selectedDistrict = $_POST['district'];
  $postal = $_POST['postal'];
  $gender = $_POST['gender'];
  $religion = $_POST['religion'];
  $marital = $_POST['marital'];

$selectedDivisionName = '';
$selectedDistrictName = '';

foreach ($divisions as $division) {
  if ($division['name'] === $selectedDivision) {
    $selectedDivisionName = $division['name'];
    $districts = $division['districts'];
    foreach ($districts as $district) {
      if ($district === $selectedDistrict) {
        $selectedDistrictName = $district;
        break;
      }
    }
    break;
  }
}
  
  $img = "IMG_" . time() . "_qb.jpg";
  move_uploaded_file($avatar['tmp_name'], "../../../uploads/users" . $img);

  if ($pass1 == $pass2) {
    $pass = password_hash($pass1, PASSWORD_DEFAULT);
    try {
      if ($users->create($fname, $lname, $uname, $email, $phone, $pass, $role, $status)) {
        $userId = $db->conn->insert_id;
        if (Profile::makeProfile($userId, $bio, $img, $altEmail, $altPhone, $address, $selectedDivision, $selectedDistrict, $postal, $gender, $religion, $marital, $db->conn)) {
          $response = [
            'success' => true,
            'message' => 'User created successfully!'
          ];
        } else {
          $response = [
            'success' => false,
            'message' => 'Failed to create profile.'
          ];
        }
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to create user.'
        ];
      }
    } catch (\Throwable $e) {
      $response = [
        'success' => false,
        'message' => 'An error occurred : ' . $e->getMessage()
      ];
    }
  } else {
    $response = [
      'success' => false,
      'message' => 'Passwords do not match.'
    ];
  }

  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}