<?php
require_once "db_connection.php";
require_once "errors.php";

if (isset($_POST['logout'])) {
    $ip = $_SERVER['REMOTE_ADDR'];

    $stmt = $pdo->prepare("UPDATE banned SET tries = 0, ban = 0 WHERE ip = :ip");
    $stmt->execute(['ip' => $ip]);

    session_destroy();
    header("Location: login.php");
    exit;
}

$error_message = null;
$correct_auth = true;
$first_time = null;
$stmt = $pdo->prepare("SELECT * FROM banned where ip = :ip");
$stmt->execute([
    'ip' => $_SERVER['REMOTE_ADDR']
]);
$ban = false;
if(!$stmt->rowCount())
{
    $first_time = time();
    $stmt = $pdo->prepare("INSERT INTO banned (ip, tries, ban) VALUES (:ip, :tries, :ban)");
    $stmt->execute([
        'ip' => $_SERVER['REMOTE_ADDR'],
        'tries' => 0,
        'ban' => 0
    ]);
}
else if($stmt->rowCount() > 0)
{
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user['tries'] > 1 and $user['ban'] == 0)
    {
        $stmt = $pdo->prepare("UPDATE banned SET time = :time, ban = :ban where ip = :ip");
        $stmt->execute([
            'time' => time(),
            'ban' => 1,
            'ip' => $_SERVER['REMOTE_ADDR']
        ]);
        header('Location: '.$_SERVER['PHP_SELF']);
    }
    if($user['ban']  == 1)
    {
        if(time() - $user['time'] < 3600)
        {
            $error_message .= "Вы забанены.<br>";
            $correct_auth = false;
            $ban = true;
        }
        else
        {
            $_SESSION['count'] = 0;
            $first_time = time();
            $stmt = $pdo->prepare("DELETE FROM banned where ip = :ip");
            $stmt->execute([
                'ip' => $_SERVER['REMOTE_ADDR']
            ]);
        }
    }
}
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
if (!empty($_POST) && $submit == "submit" && !$ban) {
    $login = htmlspecialchars(isset($_POST['login']) ? $_POST['login'] : '');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login");
    $stmt->execute(['login' => $login]);

    if (!$stmt->rowCount()) {

        $stmt = $pdo->prepare("SELECT * FROM banned WHERE ip = :ip");
        $stmt->execute(['ip' => $_SERVER['REMOTE_ADDR']]);
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $user['tries']++;
        } else {

            $user = ['tries' => 1];
            $stmt = $pdo->prepare("INSERT INTO banned (ip, tries, ban) VALUES (:ip, :tries, :ban)");
            $stmt->execute([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'tries' => $user['tries'],
                'ban' => 0
            ]);
        }
        
        $stmt = $pdo->prepare("UPDATE banned SET tries = :tries WHERE ip = :ip");
        $stmt->execute([
            'tries' => $user['tries'],
            'ip' => $_SERVER['REMOTE_ADDR']
        ]);

        $correct_auth = false;
        $error_message .= "Такого пользователя не существует.<br>";
        $error_message .= "Количество попыток авторизации {$user['tries']}.<br>";
        $error_message .= "После третьей неудачной попытки вы не сможете авторизироваться в течении часа.<br>";
    } else {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['login'] = $user['login'];
            $_SESSION['count'] = 0;
        
            $stmt = $pdo->prepare("UPDATE banned SET tries = 0, ban = 0 WHERE ip = :ip");
            $stmt->execute(['ip' => $_SERVER['REMOTE_ADDR']]);
            
            header("Location: index.php");
            die;
        }
        else {
            $stmt = $pdo->prepare("SELECT * FROM banned WHERE ip = :ip");
            $stmt->execute(['ip' => $_SERVER['REMOTE_ADDR']]);
            
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $user['tries']++;
                
                $stmt = $pdo->prepare("UPDATE banned SET tries = :tries WHERE ip = :ip");
                $stmt->execute([
                    'tries' => $user['tries'],
                    'ip' => $_SERVER['REMOTE_ADDR']
                ]);
            } else {
                $user = ['tries' => 1];
                $stmt = $pdo->prepare("INSERT INTO banned (ip, tries, ban) VALUES (:ip, :tries, :ban)");
                $stmt->execute([
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'tries' => $user['tries'],
                    'ban' => 0
                ]);
            }

            $correct_auth = false;
            $error_message .= "Введен неверный пароль.<br>";
            $error_message .= "Количество попыток авторизации {$user['tries']}.<br>";
            $error_message .= "После третьей неудачной попытки вы не сможете авторизироваться в течении часа.<br>";

        }
    }
    error_log("IP: " . $_SERVER['REMOTE_ADDR'] . " - Tries: " . $user['tries'] . " - Ban: " . $user['ban']);

}