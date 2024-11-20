<?php

function check_password($password_for_validate, $password_again)
{
    $result_error_string = "";

// Проверка длины пароля (больше 6 символов)
    if (strlen($password_for_validate) < 6) {
        $result_error_string .= "Пароль должен быть длиннее 6 символов.<br>";
    }

// Проверка наличия больших и маленьких латинских букв
    if (!preg_match("/[A-Z]/", $password_for_validate) || !preg_match("/[a-z]/", $password_for_validate)) {
        $result_error_string .= "Пароль должен содержать как минимум одну большую и одну маленькую латинскую букву.<br>";
    }

// Проверка наличия спецсимволов, пробела, дефиса, подчеркивания и цифр
    if (!preg_match("/[\s\-_0-9]/", $password_for_validate)) {
        $result_error_string .= "Пароль должен содержать хотя бы один спецсимвол, пробел, дефис, подчеркивание или цифру.<br>";
    }

// Проверка на отсутствие русских букв
    if (preg_match("/[А-Яа-яЁё]/u", $password_for_validate)) {
        $result_error_string .= "Пароль не может содержать русские символы.<br>";
    }

    if ($result_error_string === "") {
// Проверка совпадения введенного пароля и его подтверждения
        if ($password_for_validate !== $password_again) {
            $result_error_string .= "Пароли не совпадают.<br>";
        }
    }

    if ($result_error_string === "") {
        return "correct";
    } else {
        return $result_error_string;
    }
}
