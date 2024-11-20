<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/bb300/mylr67/lr67/db_class.php');
require_once "goods_class.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $errors = [];
    $is_image = false;

    // проверка типа изображения
    if (in_array($_FILES["img"]["type"], array("image/jpeg", "image/png", "image/jpg", "image/gif", "image/bmp"))) {
        $is_image = true;
    }

    // проверка формата изображения
    if (!$is_image) {
        $errors[] = "Некорректный формат изображения";
    }

    // проверка стоимости
    if (!filter_var($_POST['cost'], FILTER_VALIDATE_INT)) {
        $errors[] = "Стоимость не является числом";
    } elseif ($_POST['cost'] < 0) {
        $errors[] = "Стоимость меньше нуля";
    }

    // проверка типа товара
    if (!filter_var($_POST['type'], FILTER_VALIDATE_INT)) {
        $errors[] = "Неверный тип товара";
    }

    // если ошибки нет, добавляем товар
    if ($_FILES && $_FILES["img"]["error"] == UPLOAD_ERR_OK && $is_image) {
        if (count($errors) == 0) {
            Goods::add($_POST['name'], $_POST['cost'], $_POST['des'], (int)$_POST['type'], $_FILES["img"]["name"], $_FILES["img"]["tmp_name"]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    Goods::delete($_POST['delete']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_'])) {
    $errors = [];

    // проверка стоимости
    if (!filter_var($_POST['cost'], FILTER_VALIDATE_INT)) {
        $errors[] = "Стоимость не является числом";
    } elseif ($_POST['cost'] < 0) {
        $errors[] = "Стоимость меньше нуля";
    }

    // проверка типа товара
    if (!filter_var($_POST['type'], FILTER_VALIDATE_INT)) {
        $errors[] = "Неверный тип товара";
    }

    // если не было изображения, редактируем без файла
    if (!($_FILES && $_FILES["img"]["error"] == UPLOAD_ERR_OK)) {
        if (count($errors) == 0) {
            Goods::edit_without_file($_GET['id'], $_POST['name'], $_POST['cost'], $_POST['des'], (int)$_POST['type']);
        }
    } else {
        $is_image = false;

        // проверка типа изображения
        if (in_array($_FILES["img"]["type"], array("image/jpeg", "image/png", "image/jpg", "image/gif", "image/bmp"))) {
            $is_image = true;
        }

        // проверка формата изображения
        if (!$is_image) {
            $errors[] = "Некорректный формат изображения";
        }

        // если есть изображение, редактируем с файлом
        if ($_FILES && $_FILES["img"]["error"] == UPLOAD_ERR_OK && $is_image) {
            if (count($errors) == 0) {
                Goods::edit_with_file($_GET['id'], $_POST['name'], $_POST['cost'], $_POST['des'], (int)$_POST['type'], $_POST['edit_'], $_FILES["img"]["name"], $_FILES["img"]["tmp_name"]);
            }
        }
    }
}
?>
