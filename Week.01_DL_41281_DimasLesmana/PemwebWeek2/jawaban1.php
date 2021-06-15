<?php
$negara = array(
  "India" => array(
    "ibuKota" => "New Delhi",
    "kodeTel" => "91",
    "mataUang" => "INR"
  ),
  "Indonesia" => array(
    "ibuKota" => "Jakarta",
    "kodeTel" => "62",
    "mataUang" => "IDR"
  ),
  "Japan" => array(
    "ibuKota" => "Tokyo",
    "kodeTel" => "81",
    "mataUang" => "JPY"
  )
);

foreach ($negara as $key => $items) {
  $capital = $items['ibuKota'];
  $calling_code = $items['kodeTel'];
  $currency = $items['mataUang'];
  echo "<strong><i>$capital</i></strong> is capital city of <strong>$key</strong>. <u>{$key}'s calling code is $calling_code and has \"$currency\" as currency code.</u>";
  echo '<br>';
}

?>