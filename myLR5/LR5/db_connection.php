<?php
session_start();
try
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=sportshop', 'root', null);
}
catch (PDOException $exception)
{

    echo $exception->getMessage();
    die;
}


