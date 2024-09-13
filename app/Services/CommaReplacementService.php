<?php

namespace App\Services;

class CommaReplacementService
{
  /**
   * Replace Persian comma with English comma in a given string.
   *
   * @param string $text
   * @return string
   */
  public static function replaceComma(string $text): string
  {
    // Replace Persian comma (،) with English comma (,)
    return str_replace('،', ',', $text);
  }
}
