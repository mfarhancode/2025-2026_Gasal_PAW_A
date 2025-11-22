<?php 
session_start();
require 'conn.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        if($password == $row['password']){
            $_SESSION['username']=$row['username'];
            $_SESSION['login']=true;
            $_SESSION['level']=$row['level'];
            $_SESSION['id_user']=$row['id_user'];
            echo "<script>alert('Login succesfully! Welcome ". $row['nama'] ."');
            window.location.href='index.php'       
            ;</script>";
        }else{
            echo 'Wrong Password';
        }
    }else{
        echo "Username does not exist";
    }
}
?>
<!DOCTYPE html>
<body>
    <h2 style='color:blue'>Login Admin</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" name="submit" value='Login' style='color:white; background: blue;'>
    </form>
</body>
</html>