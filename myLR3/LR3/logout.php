<?php
session_start();
require_once "db_connection.php";

$ip = $_SERVER['REMOTE_ADDR'];

$stmt = $pdo->prepare("UPDATE banned SET tries = 0 WHERE ip = :ip");
$stmt->execute(['ip' => $ip]);

session_destroy();

header("Location: index.php");
exit;
