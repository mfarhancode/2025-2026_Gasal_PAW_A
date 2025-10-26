<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validate.inc';

    validateRequired($errors, $_POST, 'nim');
    validateRequired($errors, $_POST, 'name');
    validateRequired($errors, $_POST, 'major');

    if ($errors) {
        echo '<h3>Please correct the errors below:</h3>';
        include 'form.inc';
    } else {
        echo '<h3>Form submitted successfully!</h3>';
        echo '<p><strong>NIM:</strong> ' . htmlspecialchars($_POST['nim']) . '</p>';
        echo '<p><strong>Name:</strong> ' . htmlspecialchars($_POST['name']) . '</p>';
        echo '<p><strong>Major:</strong> ' . htmlspecialchars($_POST['major']) . '</p>';
    }
} else {
    include 'form.inc';
}
?>
