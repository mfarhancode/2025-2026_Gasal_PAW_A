<?php
$errors = array();

if (isset($_POST['surname'])) {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');

    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) {
            echo htmlspecialchars($field) . ' : ' . htmlspecialchars($error) . '<br>';
        }
        echo '<hr>';
        include 'form.inc';
    } else {
        include 'form.inc';
        echo '<p style="color:green;">Form submitted successfully with no errors.</p>';
    }
} else {
    include 'form.inc';
}
?>
