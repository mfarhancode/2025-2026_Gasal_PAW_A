<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form</title>
</head>
<body>
    <form action="file_19.php" method="get">

    Name: <input type="text" name="name" placeholder="Enter name" required>
    <br>
    Age : <input type="number" name="age" placeholder="Enter age" required>
    <br>
    <input type="submit" name='submit'>
    <br>

    <?php

    $submit = $_GET['submit'] ?? null;
    if (isset($submit)){
$name = $_GET['name'];
    $age = $_GET['age'];
    echo "My name is $name. I'm $age years old.";
    }
    ?>

</form>
</body>
</html>