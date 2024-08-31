<?php

namespace App\Services;

class NumeralConverter
{
  /**
   * Convert non-English numerals (Persian/Arabic) to English numerals.
   *
   * @param string $number
   * @return string
   */
  public static function convertToEnglish(string $number): string
  {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    // Replace Persian numerals
    $number = str_replace($persian, $english, $number);
    // Replace Arabic numerals
    $number = str_replace($arabic, $english, $number);

    $number = preg_replace('/[^\d]/', '', $number);

    return $number != '' ? $number : 0;
  }
}
