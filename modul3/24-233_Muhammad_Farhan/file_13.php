<?php
$products = array(
  "Laptop" => 8500000,
  "Mouse" => 150000,
  "Keyboard" => 250000,
  "Monitor" => 2000000,
  "Headset" => 350000
);

foreach($products as $item => $price) {
    echo "Item = " . $item . " - Price = " . $price;
    echo "<br>";
}

?>
