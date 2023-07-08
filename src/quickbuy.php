<?php
if (!function_exists('info')) {
function info() {
  $path = config("app.root");
  return [
    'name' => "QuickBuy",
    'phone' => "102424",
    'email' => "info@quickbuy.com",
    'address' => "Pallabi, Mirpur, Dhaka",
    'logo'=> $path."assets/images/logo.png",
    'description' => "Your ultimate online shopping destination. Discover endless possibilities with trusted vendors, offering fashion, electronics, home goods, and more. Seamless browsing, secure purchases, and convenience at its best. Shop with joy at QuickBuy!"
  ];
}
}

if (!function_exists('config')) {
  function config($param)
  {        
    $parts = explode(".",$param);
    $inc = include(__DIR__."/../config/".$parts[0].".php");
    return $inc[$parts[1]];
  }
}
?>