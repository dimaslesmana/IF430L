<?php 
/*
Plugin Name: WP Words Counter Plugin
Description: Simple Words Counter WordPress Plugin
Version: 1.0
Author: Dimas Lesmana
*/

defined('ABSPATH') or die('No Script kiddies please!');

function html_code($ctr=0, $ctr2=0) {
  echo "<form action='" . esc_url($_SERVER['REQUEST_URI']) . "' method='post'>";
  echo "<p>";
  echo "Input String <br>";
  echo "<textarea rows='3' name='words'>" . (isset($_POST['words']) ? esc_attr($_POST['words']) : '') . "</textarea>";
  echo "</p>";
  echo "<p><input type='submit' name='ctr_submit' value='Count!'></p>";
  echo "</form>";
  echo "<p>Words Count : " . (isset($_POST['words']) ? $ctr : '0') . " </p>";
  echo "<p>Character without space count : " . (isset($_POST['words']) ? $ctr2 : '0') . " </p>";
}

function words_counter() {
  $ctr = 0;

  if (isset($_POST['ctr_submit'])) {
    $sentence = $_POST['words'];
    $words = explode(" ", $sentence);
    $ctr = count($words);

    return $ctr;
  }
}

function char_counter() {
  $ctr = 0;

  if (isset($_POST['ctr_submit'])) {
    $sentence = $_POST['words'];
    $ctr = strlen($sentence) - (count(explode(" ", $sentence)) - 1);

    return $ctr;
  }
}

function wp_words_counter_main() {
  ob_start();
  $ctr = words_counter();
  $char_ctr = char_counter();
  html_code($ctr, $char_ctr);

  return ob_get_clean();
}

add_shortcode('words_counter', 'wp_words_counter_main');