<?php
require __DIR__  . '/../vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

// Function to crop and save uploaded images from the center
function cropImg($image, $width, $height, $destinationPath) {
  // Open the uploaded image using Intervention Image
  $img = Image::make($image);

  // Calculate the dimensions for center cropping
  $imgWidth = $img->getWidth();
  $imgHeight = $img->getHeight();
  $cropWidth = min($imgWidth, $width);
  $cropHeight = min($imgHeight, $height);
  $x = max(0, floor(($imgWidth - $cropWidth) / 2));
  $y = max(0, floor(($imgHeight - $cropHeight) / 2));

  // Crop the image from the center
  $img->crop($cropWidth, $cropHeight, $x, $y);

  // Generate a unique filename for the cropped image
  $filename = "QBP_" . time() . "_qb.jpg";

  // Save the cropped image to the desired location
  $img->save($destinationPath . $filename);

  // Return the filename for display purposes
  return $filename;
}
