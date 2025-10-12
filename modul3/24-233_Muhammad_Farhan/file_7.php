<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170", "Farhan"=>"169", "Ali"=>"190", "Umar"=>"180", "Amir"=>"175", "Babar"=>"178");
unset($height["Barry"]);
echo "Babar is " . $height['Babar'] . " cm tall.";
?>