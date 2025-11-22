<?php 
session_start();
if(!isset($_SESSION['login'])){
    header('location:login.php');
}
if($_SESSION['level']==1){

    include "level_1.php";

}else{
    include "level_2.php";
}
?>

<br><br>
<form action="logout.php" method="post">
    <input type="submit" name="logout" value="logout">
</form>
