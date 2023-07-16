<?php require __DIR__ . '/../../../vendor/autoload.php';

use App\Database;
use App\Class\Wishlist;
$db = new Database();

Wishlist::initialize($db->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = 3;
  $product = $_POST['product_id'];
  echo "Product Addedd";
  // if (isset($_POST['product'])) {
  //   $sql = "INSERT INTO wishlists ('user_id', 'product_id') VALUES('$user', '$productId')";
  //   $result->query($sql);
  //   echo "Success";
    // $productId = $_POST['productId'];
    // if (Wishlist::addToWishlist($user, $productId)) {
    //   $response = [
    //     'success' => true,
    //     'message' => 'Product added to wishlist!'
    //   ];
    // } else {
    //   $response = [
    //     'success' => false,
    //     'message' => 'Failed to create profile.'
    //   ];
    // }
} 
//   else {
//     $response = [
//       'success' => false,
//       'message' => 'An error occurred : ' . $e->getMessage()
//     ];
//   }
//   header('Content-Type: application/json');
//   echo json_encode($response);
//   exit();
// }