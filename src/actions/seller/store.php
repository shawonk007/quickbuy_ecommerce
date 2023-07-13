<?php
require __DIR__ . '/../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Auth;
use App\Class\MerchantProfile;
use App\Database;
use App\Class\Merchants;
use App\Pathify;

$db = new Database();
$store = new Merchants($db->conn);
MerchantProfile::initialize($db->conn);

$jsonData = file_get_contents(config("app.root") . 'assets/data/bangladesh.json');
$data = json_decode($jsonData, true);
$divisions = $data['divisions'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $logo = $_FILES['logo'];
  $banner = $_FILES['banner'];
  $name = $_POST['name'];
  $tagline = $_POST['tagline'];
  $slug = isset($_POST['slug']) ? $_POST['slug'] : Pathify::make($name);
  // if ($_SESSION['login'] && (Auth::check() && Auth::isMerchant())) {
  //   $owner = $_SESSION['user']['id'];
  // } else {
    $owner = $_POST['owner'];
  // }
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $website = $_POST['website'];
  $facebook = $_POST['facebook'];
  $whatsapp = $_POST['whatsapp'];
  $cat = isset($_POST['category']) ? $_POST['category'] : 0;
  $desc = $_POST['description'];
  $line1 = $_POST['address_one'];
  $line2 = $_POST['address_two'];
  $selectedDivision = $_POST['division'];
  $selectedDistrict = $_POST['district'];
  $postal = $_POST['postal'];
  $status = isset($_POST['status']) ? $_POST['status'] : NULL;
  $featured = isset($_POST['featured']) ? $_POST['featured'] : NULL;
  $verified = isset($_POST['verified']) ? $_POST['verified'] : NULL;
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
  if (empty($name)) {
    $response = [
      'success' => false,
      'message' => 'Store cannot be empty.',
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($store->exists('store_name', $name)) {
    $response = [
      'success' => false,
      'message' => 'Store already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if ($store->exists('store_slug', $slug)) {
    $response = [
      'success' => false,
      'message' => 'Slug is not available.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if (MerchantProfile::exists('store_email', $email)) {
    $response = [
      'success' => false,
      'message' => 'This email already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if (MerchantProfile::exists('store_phone', $phone)) {
    $response = [
      'success' => false,
      'message' => 'This phone already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if (MerchantProfile::exists('store_website', $website)) {
    $response = [
      'success' => false,
      'message' => 'This website url already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if (MerchantProfile::exists('store_facebook', $facebook)) {
    $response = [
      'success' => false,
      'message' => 'This facebook url already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  if (MerchantProfile::exists('store_whatsapp', $whatsapp)) {
    $response = [
      'success' => false,
      'message' => 'WhatsApp number already exists.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }
  try {
    if ($store->create($name, $desc, $logo, $banner, $cat, $slug, $status, $verified, $featured)) {
      $storeId = $db->conn->insert_id;
      if (MerchantProfile::makeStore($storeId, $email, $phone, $line1, $line2, $selectedDivisionName, $selectedDistrict, $postal, $website, $facebook, $whatsapp)) {
        $response = [
          'success' => true,
          'message' => 'Store created successfully!'
        ];
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to store.'
        ];
      }
    }
  } catch (\Throwable $e) {
    $response = [
      'success' => false,
      'message' => 'An error occurred : ' . $e->getMessage()
    ];
  }
  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}
?>