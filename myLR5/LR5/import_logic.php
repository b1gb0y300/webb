<?php
require_once "logic.php";

$out_string = null;
$error_string = null;

if (isset($_POST['import'])) {
    $table_name = "goods";
    $table = $table_name . "_imported";

    // проверка есть ли таблица с таким имененм, если есть, но ищем свободное имя
    $i = 0;
    while (true) {
        $current_table = $i === 0 ? $table : $table . $i;
        try {
            $result = $pdo->query("SELECT * FROM {$current_table}");
            $i++;
        } catch (Exception $e) {
            // если таблица не существует, используем это имя
            $table = $current_table;
            break;
        }
    }

    $sql = "CREATE TABLE {$table} (
        `id` int(11) NOT NULL,
        `name` varchar(50) NOT NULL,
        `description` varchar(300) NOT NULL,
        `cost` int(11) NOT NULL,
        `id_type` int(11) NOT NULL,
        `img_path` varchar(100) NOT NULL
    ) ";
    $pdo->exec($sql);

    $url = $_POST['file_name'];

    // проверка, является ли ссылка внешней (например, Dropbox)
    if (strpos($url, 'dropbox.com') !== false) {
        // Преобразуем ссылку для прямого скачивания с Dropbox
        $url = str_replace('dl=0', 'dl=1', $url);
    }

    // подключаем libxml для диагностики ошибок
    libxml_use_internal_errors(true);
    $xml_data = file_get_contents($url);
    $xml = simplexml_load_string($xml_data);

    if ($xml) {
        $count = 0;
        foreach ($xml->good as $elem) {
            $id = htmlspecialchars($elem->id);
            $name = htmlspecialchars($elem->name);
            $description = htmlspecialchars($elem->description);
            $cost = htmlspecialchars($elem->cost);
            $id_type = htmlspecialchars($elem->id_type);
            $img_path = htmlspecialchars($elem->img_path);

            $sql = "INSERT INTO {$table} (id, name, description, cost, id_type, img_path) 
                    VALUES (:id, :name, :description, :cost, :id_type, :img_path)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([ 
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'cost' => $cost,
                'id_type' => $id_type,
                'img_path' => $img_path,
            ]);
            $count++;
        }
        $out_string = "Файл с данными получен из $url и обработан. Создана таблица $table и число записей в ней = $count";
    } else {
        $error_string = "Неправильный формат XML в файле. Ошибки:<br>";
        foreach (libxml_get_errors() as $error) {
            $error_string .= "XML Error: " . htmlspecialchars($error->message) . "<br>";
        }
        libxml_clear_errors();
    }
}
?>
