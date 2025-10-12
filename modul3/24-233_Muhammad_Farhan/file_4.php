<?php
$fruits =array("Avocado","Blueberry","Cherry");

$new_fruits = array('Banana', 'Grapes', 'Watermelon', 'Grapes', 'Strawbery');
for($n = 0; $n < 5; $n++){
    $fruits[] = $new_fruits[$n];
}

$arrlength = count($fruits);
for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo"<br>";
}
?>