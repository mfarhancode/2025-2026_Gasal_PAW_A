<?php

function validateRequired(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'required';
    }
}

function validateEmail(&$errors, $field_list, $field_name)
{
    $email = trim($field_list[$field_name] ?? '');
    if ($email === '') {
        $errors[$field_name] = 'required';
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors[$field_name] = 'invalid format';
    }
}

function validatePassword(&$errors, $field_list, $field_name)
{
    $password = $field_list[$field_name] ?? '';
    if (trim($password) === '') {
        $errors[$field_name] = 'required';
    } elseif (strlen($password) < 6) {
        $errors[$field_name] = 'too short (min 6 characters)';
    }
}
?>
