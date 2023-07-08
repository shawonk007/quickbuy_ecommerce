<?php
require __DIR__ . '/../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Database;
use App\Class\Products;
use App\Class\ProductStock;
use App\Pathify;
$db = new Database();
$products = new Products($db->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $shorts = $_POST['highlights'];
  $type = $_POST['type'];
  $desc = $_POST['description'];
  $weight = $_POST['weight'];
  $length = $_POST['length'];
  $width = $_POST['width'];
  $height = $_POST['height'];
  $sku = $_POST['sku'];
  $slug = Pathify::make($title);
  $rPrice = $_POST['r_price'];
  $oPrice = $_POST['o_price'];
  $shop = $_POST['merchant'];
  $sStatus = $_POST['s_status'];
  $qty = $_POST['quantity'];
  $brand = $_POST['brand'];
  $featured = isset($_POST['featured']) ? $_POST['featured'] : NULL;
  $variable = isset($_POST['variable']) ? $_POST['variable'] : NULL;
  $pStatus = $_POST['status'];

  try {
    if ($products->create($title, $desc, $type, $sku, $brand, $rPrice, $oPrice, $shorts, $slug, $pStatus, $featured)) {
      $productId = $db->conn->insert_id;
      if (ProductStock::create($productId, $qty, $db)) {
        $response = [
          'success' => true,
          'message' => 'Product created successfully!'
        ];
      } else {
        $response = [
          'success' => false,
          'message' => 'Failed to create stock.'
        ];
      }
    } else {
      $response = [
        'success' => false,
        'message' => 'Failed to create product.'
      ];
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