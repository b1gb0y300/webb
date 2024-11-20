<?php
require_once "db_connection.php";
require_once "errors.php";
$stmt = $pdo->prepare("SELECT * FROM users where login = :login");
$login = htmlspecialchars(isset($_POST['login']) ? $_POST['login'] : '');
$last_name = htmlspecialchars(isset($_POST['last_name']) ? $_POST['last_name'] : '');
$first_name = htmlspecialchars(isset($_POST['first_name']) ? $_POST['first_name'] : '');
$patronymic = htmlspecialchars(isset($_POST['patronymic']) ? $_POST['patronymic'] : '');
$rh_factor = htmlspecialchars(isset($_POST['rh_factor']) ? $_POST['rh_factor'] : '');
$blood_type = htmlspecialchars(isset($_POST['blood_type']) ? $_POST['blood_type'] : '');
$gender = htmlspecialchars(isset($_POST['gender']) ? $_POST['gender'] : '');
$vk_profile = htmlspecialchars(isset($_POST['vk_profile']) ? $_POST['vk_profile'] : '');

$birth_date = htmlspecialchars(isset($_POST['birth_date']) ? $_POST['birth_date'] : '');
$address = htmlspecialchars(isset($_POST['address']) ? $_POST['address'] : '');
$interests = htmlspecialchars(isset($_POST['interests']) ? $_POST['interests'] : '');

$password1 = htmlspecialchars(isset($_POST['password1']) ? $_POST['password1'] : '');
$password2 = htmlspecialchars(isset($_POST['password2']) ? $_POST['password2'] : '');
$checked = check_password($password1, $password2);
$error_message = null;
$correct_registration = true;
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if (!empty($_POST) and $submit == "submit") {
    if ($checked !== 'correct') {
        $error_message = $checked;
        $correct_registration = false;
    }
    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $error_message .= "Ошибка в наименовании почты.<br>";
        $correct_registration = false;
    }
    if ($correct_registration) {
        $stmt->execute(['login' => $login]);
        if ($stmt->rowCount() > 0) {
            $error_message .= "Это имя пользователя уже занято.<br>";
            $correct_registration = false;
        }
        if ($correct_registration) {
            $stmt = $pdo->prepare("INSERT INTO users (login, password, first_name, last_name, patronymic, gender, vk_profile, blood_type, rh_factor, birth_date, address, interests)
VALUES (:login, :password, :first_name, :last_name, :patronymic, :gender, :vk_profile, :blood_type, :rh_factor, :birth_date, :address, :interests)");

            $stmt->execute([
                'login' => $login,
                'password' => password_hash($password1, PASSWORD_DEFAULT),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'patronymic' => $patronymic,
                'gender' => $gender,
                'vk_profile' => $vk_profile,
                'blood_type' => $blood_type,
                'rh_factor' => $rh_factor,
                'birth_date' => $birth_date,
                'address' => $address,
                'interests' => $interests,
            ]);

            $_SESSION['login'] = $login;
            header("Location: index.php");
            die;
        }
    }
}
