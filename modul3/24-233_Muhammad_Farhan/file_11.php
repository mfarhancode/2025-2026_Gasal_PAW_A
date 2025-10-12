<?php
$students = array(
  array("Alex","220401","0812345678"),
  array("Bianca","220402","0812345687"),
  array("Candice","220403","0812345665"),
  array("Emad","220404","0812345699"),
  array("Ali","220405","0812345601"),
  array("Farhan","220406","0812345612"),
  array("Hamid","220407","0812345623"),
  array("Ayesha","220408","0812345634")
);

$arrlength = count($students);

for ($row = 0; $row < $arrlength ; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$students[$row][$col]."</li>";
  }
  echo "</ul>";
}
?>
