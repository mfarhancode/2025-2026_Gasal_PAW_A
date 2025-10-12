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

echo "<table border='1'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";

foreach ($students as $student) {
  echo "<tr>";
  echo "<td>".$student[0]."</td>";
  echo "<td>".$student[1]."</td>";
  echo "<td>".$student[2]."</td>";
  echo "</tr>";
}

echo "</table>";
?>
