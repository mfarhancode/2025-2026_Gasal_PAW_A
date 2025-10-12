<?php
$students = array(
    array("name"=>"Farhan", "scores"=>array(95, 80, 90)),
    array("name"=>"Ali", "scores"=>array(75, 80, 90)),
    array("name"=>"Faizan", "scores"=>array(95, 80, 70)),
    array("name"=>"Nadeem", "scores"=>array(95, 60, 90)),
);

function averageScore($students){
    foreach($students as $student){
        $average = array_sum($student['scores']) / count($student['scores']);
        echo $student['name'] . "'s average score: " . $average . "<br>";
    }
    
}

averageScore($students)
?>