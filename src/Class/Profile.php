<?php 

namespace App\Class;

class Profile {
  protected $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  public static function hasProfile($user, $db) {
    $sql = "SELECT * FROM users_details WHERE user_id = ?";
    $statement = $db->conn->prepare($sql);
    $statement->bind_param("i", $user);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows === 1) {
      $profile = $result->fetch_assoc();
      return $profile;
    } else {
      return false;
    }
  }

  public static function makeProfile($user, $biography, $image, $email, $phone, $address, $divison, $district, $postal, $gender, $religion, $marital, $db) {
    $sql = "INSERT INTO users_details (user_id, user_biography, user_image, alt_email_address, alt_cell_phone, user_address, user_division, user_district, postal_code, gender, religion, marital_status, created_at, updated_at) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $statement = $db->prepare($sql);
    $statement->bind_param("isssssiiiiii", $user, $biography, $image, $email, $phone, $address, $divison, $district, $postal, $gender, $religion, $marital);
    if ($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
  public static function updateProfile($id, $user, $biography, $image, $email, $phone, $address, $divison, $district, $postal, $gender, $religion, $marital, $db) {
    $sql = "UPDATE users_details SET user_id = ?, user_biography = ?, user_image = ?, alt_email_address = ?, alt_cell_phone = ?, user_address = ?, user_division = ?, user_district = ?, postal_code = ?, gender = ?, religion = ?, marital_status = ?, updated_at = NOW() WHERE detailes_id = ?)";
    $statement = $db->prepare($sql);
    $statement->bind_param("isssssiiiiiii", $user, $biography, $image, $email, $phone, $address, $divison, $district, $postal, $gender, $religion, $marital, $id);
    $statement->execute();
    if ($statement->affected_rows === 1) {
      return true;
    } else {
      return false;
    }
  }
}