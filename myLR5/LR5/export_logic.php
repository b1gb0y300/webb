<?php
require_once "logic.php";

if (isset($_POST['path_to_save'])) {
    $path_to_save = trim($_POST['path_to_save']);

    $base_path = $_SERVER['DOCUMENT_ROOT'] . '/bb300/myLR5/LR5';
    
    // проверка, является ли путь допустимым
    if (!preg_match('/^\/[a-zA-Z0-9\/_.-]+$/', $path_to_save)) {
        $error_string = "Ошибка: путь содержит недопустимые символы.";
        return;
    }

    // проверка на наличие расширения
    if (pathinfo($path_to_save, PATHINFO_EXTENSION) === '') {
        $path_to_save .= '.xml'; // Добавляем расширение .xml, если его нет
    }

    $file_path = $base_path . $path_to_save;

    // проверка, заканчивается ли путь на .xml
    if (pathinfo($file_path, PATHINFO_EXTENSION) !== 'xml') {
        $error_string = "Ошибка: файл должен иметь расширение .xml.";
        return;
    }

    // проверка пути на корректность
    $dir = dirname($file_path);
    if (strpos(realpath($dir), realpath($base_path)) !== 0) {
        $error_string = "Ошибка: путь для сохранения выходит за пределы допустимого каталога.";
        return;
    }

    $sql = "SELECT * FROM goods";
    $all_files = $pdo->prepare($sql);
    $all_files->execute();

    // создание объекта DOMDocument для генерации XML
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;

    // создание корневого элемента
    $root = $xml->createElement('goods');
    $xml->appendChild($root);

    foreach ($all_files as $item) {
        // Ссозданне элемента для каждой записи
        $goods = $xml->createElement('good');

        // добавление дочерних элементов для каждой строки
        $goods->appendChild($xml->createElement('id', htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8')));
        $goods->appendChild($xml->createElement('name', htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8')));
        $goods->appendChild($xml->createElement('description', htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8')));
        $goods->appendChild($xml->createElement('cost', htmlspecialchars($item['cost'], ENT_QUOTES, 'UTF-8')));
        $goods->appendChild($xml->createElement('id_type', htmlspecialchars($item['id_type'], ENT_QUOTES, 'UTF-8')));
        $goods->appendChild($xml->createElement('img_path', htmlspecialchars($item['img_path'], ENT_QUOTES, 'UTF-8')));

        // добавление элемента good в корень
        $root->appendChild($goods);
    }

    // создаем директорию, если она не существует
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true); // Создаем директорию с правами на запись
    }

    // сохраниение xml на сервере
    if ($xml->save($file_path)) {
        $out_string = "Файл успешно сохранен по пути: " . htmlspecialchars($file_path);
    } else {
        $error_string = "Не удалось сохранить файл.";
    }
}
?>
