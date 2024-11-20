<?php
global $pdo;

$DB = 'mysql:host=127.0.0.1;dbname=sportshop;charset=utf8mb4';
$USER = 'root';
$PASSWORD = '';

try {
    $pdo = new PDO($DB, $USER, $PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Connection failed: " . $exception->getMessage();
    die;
}


if (isset($_GET['reset']) && $_GET['reset'] === 'Reset') {
    header("Location: sportshop.php");
    exit;
}

$min_price = $_GET['min_price'] ?? '';
$max_price = $_GET['max_price'] ?? '';
$goods_name = $_GET['goods_name'] ?? '';
$type_index = $_GET['type'] ?? '';

$goods_name_like = "%$goods_name%";

$sql = "SELECT g.img_path, g.name, b.name_type AS type_name, g.description, g.cost 
        FROM goods g 
        INNER JOIN types b ON g.id_type = b.id_type 
        WHERE 
        (g.cost >= :min_price OR :min_price = '') AND 
        (g.cost <= :max_price OR :max_price = '') AND 
        (g.name LIKE :goods_name OR :goods_name = '') AND 
        (g.id_type = :type_index OR :type_index = '')";

$sql_types = "SELECT id_type, name_type FROM types";

try {
    $all_goods = $pdo->prepare($sql);
    $types_names = $pdo->prepare($sql_types);

    $all_goods->execute([
        ':min_price' => $min_price,
        ':max_price' => $max_price,
        ':goods_name' => $goods_name_like,
        ':type_index' => $type_index,
    ]);

    $types_names->execute();

    $GLOBALS['all_goods'] = $all_goods->fetchAll(PDO::FETCH_ASSOC);
    $GLOBALS['types_names'] = $types_names->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
