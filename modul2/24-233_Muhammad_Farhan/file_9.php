

<form method='post'>
    Marks:
    <input type='number' name='marks'>
    <input type='submit'>
</form>

<?php
$marks = $_POST['marks']??null;
// echo $marks;
if (isset($marks)){
if ($marks >= 90){
    echo "Grade: A";
}elseif($marks >= 80){
    echo "Grade: B";
}elseif($marks >= 70){
    echo "Grade: C";
}elseif($marks >= 60){
    echo "Grade: D";
}else{
    echo "Grade: E";
}
}


?>