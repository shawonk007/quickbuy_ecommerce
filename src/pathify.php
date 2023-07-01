<?php

namespace App;

/**
 * Class Pathify
 * Generates a slug from a given title
 */

class Pathify {
  /**
   * Generate a slug from a given title
   * 
   * @param string The title to generate the slug from.
   * @return string The generated slug.
   */

  public static function make(string $title) {
    // Convert the title to lowercase
    $slug = mb_strtolower($title);
    
    // Replace spaces, special characters with dashes
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);

    // Replace ampersand with 'and'
    $slug = str_replace('&', 'and', $slug);

    // Remove leading and trailing dashes
    $slug = trim($slug, '-');

    // Return the generated slug
    return $slug;
  }
}