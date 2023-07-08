<?php
require __DIR__ . '/../../../vendor/autoload.php';

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
  $id = $_POST['user'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $uname = $_POST['uname'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $altEmail = $_POST['alt_email'];
  $phone = $_POST['phone'];
  $altPhone = $_POST['alt_phone'];
  $bio = $_POST['biography'];
  $address = $_POST['address'];
  $selectedDivision = $_POST['division'];
  $selectedDistrict = $_POST['district'];
  $postal = $_POST['postal'];
  $gender = $_POST['gender'];
  $religion = $_POST['religion'];
  $marital = $_POST['marital'];

  // echo $id, $fname, $lname, $uname, $email, $phone;
  // exit();

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
  move_uploaded_file($avatar['tmp_name'], "../../../uploads/users/" . $img);

  // try {
    if ($users->update($id, $fname, $lname, $uname, $email, $phone)) {
      // echo $sql; // Display the generated SQL statement
      var_dump([$fname, $lname, $uname, $email, $phone, $id]); // Display the bound parameters
      exit();
      $hasProfile = Profile::hasProfile($id, $db); // Check if authenticated user has a profile
      if ($hasProfile) {
        // Update existing profile
        $detailsId = $profile->details_id;
        if ($profile->updateProfile($detailsId, $id, $bio, $img, $altEmail, $altPhone, $address, $selectedDivision, $selectedDistrict, $postal, $gender, $religion, $marital, $db)) {
          $response = [
            'success' => true,
            'message' => 'User profile updated successfully!'
          ];
        } else {
          $response = [
            'success' => false,
            'message' => 'Failed to update user profile.'
          ];
        }
      } else {
        // Create new profile
        if (Profile::makeProfile($id, $bio, $img, $altEmail, $altPhone, $address, $selectedDivision, $selectedDistrict, $postal, $gender, $religion, $marital, $db)) {
          $response = [
            'success' => true,
            'message' => 'User created successfully!'
          ];
        } else {
          $response = [
            'success' => false,
            'message' => 'Failed to create user profile.'
          ];
        }
      }
    } else {
      $response = [
        'success' => false,
        'message' => 'Failed to create user.'
      ];
    }
  // } catch (\Throwable $e) {
  //   $response = [
  //     'success' => false,
  //     'message' => 'An error occurred: ' . $e->getMessage()
  //   ];
  // }

  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}