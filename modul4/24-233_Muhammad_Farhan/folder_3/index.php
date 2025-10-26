<?php

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validate.inc';

    validateRequired($errors, $_POST, 'nim');
    validateRequired($errors, $_POST, 'name');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if ($errors) {
        echo '<h3>Please correct the errors below:</h3>';
        include 'form.inc';
    } else {
        echo '<h3 style="color:green;">Form submitted successfully!</h3>';
        echo '<p><strong>NIM:</strong> ' . htmlspecialchars($_POST['nim']) . '</p>';
        echo '<p><strong>Name:</strong> ' . htmlspecialchars($_POST['name']) . '</p>';
        echo '<p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>';
        echo '<p><strong>Password:</strong> ' . htmlspecialchars($_POST['password']) . '</p>';
    }
} else {
    include 'form.inc';
}
?>
