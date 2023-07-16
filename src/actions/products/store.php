<?php require __DIR__ . '/../../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use App\Database;
use App\Class\Products;
use App\Class\ProductStock as Stock;
use App\Class\ProductImages as Images;
use App\Class\ProductDetails as Details;
use App\Class\ProductOptions as Options;
use App\Class\ProductShipping as Shipping;
use App\Pathify;
use Intervention\Image\ImageManagerStatic as Image;

$db = new Database();
$products = new Products($db->conn);

Images::initialize($db->conn);
Stock::initialize($db->conn);
Shipping::initialize($db->conn);
Options::initialize($db->conn);
Details::initialize($db->conn);

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
  $main = $_POST['main_category'];
  $sub = $_POST['sub_category'];
  $type = $_POST['product_type'];
  $highlights = $_POST['highlights'];
  $description = $_POST['description'];
  $specifications = $_POST['specifications'];
  $additional = $_POST['additional'];
  $oName = $_POST['o_name'] ?? array();
  $oType = $_POST['o_type'] ?? array();
  $oValue = $_POST['o_value'] ?? array();
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
      if ($products->create($title, $sku, $brand, $rPrice, $oPrice, $slug, $img, $pStatus, $featured)) {
        $productId = $db->conn->insert_id;
        if (
          // $products->category($productId, $main, $sub, $type) && Stock::addProductStock($productId, $qty, $sStatus) &&
          // Details::addProductDetails($productId, $highlights, $description, $specifications, $additional) &&
          // Shipping::addProductShipping($productId, $weight, $length, $width, $height) && 
          // Images::addProductImage($productId, $imgs) && 
          Options::addProductOption($productId, $oName, $oType, $oValue)) {
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