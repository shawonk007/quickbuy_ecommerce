<?php

namespace App\Class;

class Comments
{
    private static $conn;
    private static $table = 'comments';

    public static function setConnection($db)
    {
        self::$conn = $db;
    }

    public static function addCommentForPost($postId, $userId, $comment)
    {
        $sql = "INSERT INTO " . self::$table . " (post_id, user_id, comment, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iis", $postId, $userId, $comment);
        $stmt->execute();
        $commentId = $stmt->insert_id;
        $stmt->close();

        return $commentId;
    }

    public static function addCommentForProduct($productId, $userId, $comment)
    {
        $sql = "INSERT INTO " . self::$table . " (product_id, user_id, comment, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("iis", $productId, $userId, $comment);
        $stmt->execute();
        $commentId = $stmt->insert_id;
        $stmt->close();

        return $commentId;
    }

    public static function updateComment($commentId, $comment)
    {
        $sql = "UPDATE " . self::$table . " SET comment = ? WHERE comment_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("si", $comment, $commentId);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();

        return $affectedRows;
    }

    public static function getCommentsForPost($postId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE post_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = [];

        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }

        $stmt->close();

        return $comments;
    }

    public static function getCommentsForProduct($productId)
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE product_id = ? ORDER BY created_at ASC";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = [];

        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }

        $stmt->close();

        return $comments;
    }
}


?>