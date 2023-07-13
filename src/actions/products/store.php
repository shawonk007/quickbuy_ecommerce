<?php
require __DIR__ . '/../../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Database;
use App\Class\Products;
use App\Class\ProductStock;
use App\Class\ProductImages;
use App\Class\ProductOptions;
use App\Class\ProductShipping;
use App\Pathify;
use Intervention\Image\ImageManagerStatic as Image;

$db = new Database();
$products = new Products($db->conn);

ProductImages::initialize($db->conn);
ProductStock::initialize($db->conn);
ProductShipping::initialize($db->conn);
ProductOptions::initialize($db->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $thumbnail = $_FILES['thumbnail'];
  $ext = ['jpg', 'jpeg', 'png', 'webp'];
  $size = 2 * 1024 * 1024;
  $fileExt = strtolower(pathinfo($thumbnail['name'], PATHINFO_EXTENSION));
  $fileSize = $thumbnail['size'];
  if (!in_array($fileExt, $ext) || $fileSize > $size) {
    $response = [
      'success' => false,
      'message' => 'Invalid file type or size. Please upload a JPG, JPEG, PNG, or SVG file up to 1 MB in size.'
    ];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
  }

  $title = $_POST['title'];
  $shorts = $_POST['highlights'];
  $type = $_POST['type'];
  $desc = $_POST['description'];
  $oName = $_POST['o_name'];
  $oType = $_POST['o_type'];
  $oValue = $_POST['o_value'];
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

  if ($thumbnail['error'] === UPLOAD_ERR_OK) {
    $path = __DIR__ . '/../../../uploads/products/';
    if (!is_dir($path)) {
      mkdir($path, 0777, true);
    }
    $img = "QBP_" . time() . "_qb.jpg";
    $image = (new Image())->make($thumbnail['tmp_name']);
    $image->encode('jpg', 80);
    $image->resize(700, null, function ($constraint) {
      $constraint->aspectRatio();
    });
    $image->save($path . $img);

    try {
      if ($products->create($title, $desc, $type, $sku, $brand, $rPrice, $oPrice, $shorts, $slug, $pStatus, $featured)) {
        $productId = $db->conn->insert_id;
        if (ProductStock::addProductStock($productId, $qty, $sStatus) || ProductShipping::addProductShipping($productId, $weight, $length, $width, $height) || ProductImages::addProductImage($productId, $img)) {
          $response = [
            'success' => true,
            'message' => 'Product created successfully!'
          ];
        } else {
          $response = [
            'success' => false,
            'message' => 'Failed to create.'
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
  } else {
    $response = [
      'success' => false,
      'message' => 'File upload failed.'
    ];
  }
  header('Content-Type: application/json');
  echo json_encode($response);
  exit();
}