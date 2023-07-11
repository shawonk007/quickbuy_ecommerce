<?php

namespace App\Class;

class Reviews
{
    private static $conn;
    private static $table = 'reviews';

    public static function initialize($db)
    {
        self::$conn = $db;
    }

    public static function addReviewForProduct($productId, $userId, $rating, $comment)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, user_id, rating, comment, created_at) VALUES (?, ?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iiis", $productId, $userId, $rating, $comment);
        $stmt->execute();
        $reviewId = $stmt->insert_id;
        $stmt->close();

        return $reviewId;
    }

    public static function addReviewForVendor($vendorId, $userId, $rating, $comment)
    {
        $sql = "INSERT INTO " . self::$table . " (vendor_id, user_id, rating, comment, created_at) VALUES (?, ?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iiis", $vendorId, $userId, $rating, $comment);
        $stmt->execute();
        $reviewId = $stmt->insert_id;
        $stmt->close();

        return $reviewId;
    }

    public static function updateReview($reviewId, $rating, $comment)
    {
        $sql = "UPDATE " . self::$table . " SET rating = ?, comment = ? WHERE review_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("isi", $rating, $comment, $reviewId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getReviewsForProduct($productId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = [];

        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        $stmt->close();

        return $reviews;
    }

    public static function getReviewsForVendor($vendorId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE vendor_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $vendorId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = [];

        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        $stmt->close();

        return $reviews;
    }

    public static function getAverageRatingForProduct($productId)
    {
        $sql = "SELECT AVG(rating) AS average_rating FROM " . self::$table . " WHERE product_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $averageRating = $row['average_rating'];
        $stmt->close();

        return $averageRating;
    }

    public static function getAverageRatingForVendor($vendorId)
    {
        $sql = "SELECT AVG(rating) AS average_rating FROM " . self::$table . " WHERE vendor_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $vendorId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $averageRating = $row['average_rating'];
        $stmt->close();

        return $averageRating;
    }
}


?>