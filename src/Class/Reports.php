<?php

namespace App\Class;

class Report
{
    private static $conn;
    private static $table = 'reports';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function createReport($userId, $postId, $reason)
    {
        $sql = "INSERT INTO " . self::$table . " (user_id, post_id, reason, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iis", $userId, $postId, $reason);
        $stmt->execute();
        $reportId = $stmt->insert_id;
        $stmt->close();

        return $reportId;
    }

    public static function getReports()
    {
        $sql = "SELECT * FROM " . self::$table . " ORDER BY created_at ASC";
        $result = self::$conn->query($sql);
        $reports = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reports[] = $row;
            }
        }

        return $reports;
    }

    public static function getReportsByUser($userId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE user_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reports = [];

        while ($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }

        $stmt->close();

        return $reports;
    }

    public static function getReportsByPost($postId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE post_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reports = [];

        while ($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }

        $stmt->close();

        return $reports;
    }

    public static function getReportsByProduct($productId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reports = [];

        while ($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }

        $stmt->close();

        return $reports;
    }

    public static function getReportsByVendor($vendorId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE vendor_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $vendorId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reports = [];

        while ($row = $result->fetch_assoc()) {
            $reports[] = $row;
        }

        $stmt->close();

        return $reports;
    }
}
?>