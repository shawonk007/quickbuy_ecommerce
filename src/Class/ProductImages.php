<?php

namespace App\Class;

class ProductImages
{
    private static $conn;
    private static $table = 'product_images';

    public static function initialize($db)
    {
        self::$conn = $db;
    }

    public static function addProductImage($productId, $imagePath)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, product_image) VALUES (?, ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("is", $productId, $imagePath);
        $stmt->execute();
        $productImageId = $stmt->insert_id;
        $stmt->close();

        return $productImageId;
    }

    public static function updateProductImage($productImageId, $imagePath)
    {
        $sql = "UPDATE " . self::$table . " SET product_image = ? WHERE image_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("si", $imagePath, $productImageId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function deleteProductImage($productImageId)
    {
        $sql = "DELETE FROM " . self::$table . " WHERE image_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productImageId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getProductImages($productId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
          $thumbnail = $result->fetch_assoc();
          return $thumbnail['product_image'];
        } else {
            return false;
        }
        // $productImages = $result->fetch_assoc();
        // $productImages = [];

        // while ($row = $result->fetch_assoc()) {
        //     $productImages[] = $row;
        // }

        // $stmt->close();

        // return $productImages['product_image'];
    }

    public static function getProductImage($productImageId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE image_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productImageId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productImage = $result->fetch_assoc();
        $stmt->close();

        return $productImage;
    }
}

?>