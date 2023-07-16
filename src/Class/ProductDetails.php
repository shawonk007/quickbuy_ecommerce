<?php

namespace App\Class;

class ProductDetails
{
    private static $conn;
    private static $table = 'product_details';

    public static function initialize($db)
    {
        self::$conn = $db;
    }

    public static function addProductDetails($productId, $highlights, $description, $specifications, $additionals)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, product_highlights, product_description, product_specifications, product_additionals) VALUES (?, ?, ?, ?, ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("issss", $productId, $highlights, $description, $specifications, $additionals);
        $stmt->execute();
        $productDetailsId = $stmt->insert_id;
        $stmt->close();

        return $productDetailsId;
    }

    public static function updateProductDetails($productDetailsId, $highlights, $description, $specifications, $additionals)
    {
        $sql = "UPDATE " . self::$table . " SET product_highlights = ?, product_description = ?, product_specifications = ?, product_additionals = ? WHERE pdetail_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("ssssi", $highlights, $description, $specifications, $additionals, $productDetailsId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getProductDetails($productDetailsId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE pdetail_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productDetailsId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productDetails = $result->fetch_assoc();
        $stmt->close();

        return $productDetails;
    }

    // public static function getProductOptionsByProduct($productId)
    // {
    //     $sql = "SELECT * FROM " . self::$table . " WHERE product_id = ?";
    //     $stmt = self::$conn->prepare($sql);
    //     $stmt->bind_param("i", $productId);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $productOptions = [];

    //     while ($row = $result->fetch_assoc()) {
    //         $productOptions[] = $row;
    //     }

    //     $stmt->close();

    //     return $productOptions;
    // }
    
    // public static function getProductOptions($productIds)
    // {
    //     $ids = implode(',', $productIds);
    //     $sql = "SELECT * FROM " . self::$table . " WHERE product_id IN ($ids)";
    //     $stmt = self::$conn->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $productOptions = [];

    //     while ($row = $result->fetch_assoc()) {
    //         $productOptions[$row['product_id']][] = $row;
    //     }

    //     $stmt->close();

    //     return $productOptions;
    // }
}

?>