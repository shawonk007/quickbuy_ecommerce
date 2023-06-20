<?php

namespace App;

class Auth {
  private $user;
  private $role;

  public function __construct($user, $role) {
    $this->user = $user;
    $this->role = $role;
  }

  public static function isAdmin() {}

  public static function isMerchant() {}

}
