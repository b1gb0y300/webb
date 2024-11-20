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
$brand_index = $_GET['brand'] ?? '';

$goods_name_like = "%$goods_name%";

$sql = "SELECT g.img_path, g.name, b.name_brand AS brand_name, g.description, g.cost 
        FROM goods g 
        INNER JOIN brands b ON g.id_brand = b.id_brand 
        WHERE 
        (g.cost >= :min_price OR :min_price = '') AND 
        (g.cost <= :max_price OR :max_price = '') AND 
        (g.name LIKE :goods_name OR :goods_name = '') AND 
        (g.id_brand = :brand_index OR :brand_index = '')";

$sql_brands = "SELECT id_brand, name_brand FROM brands";

try {
    $all_goods = $pdo->prepare($sql);
    $brands_names = $pdo->prepare($sql_brands);

    $all_goods->execute([
        ':min_price' => $min_price,
        ':max_price' => $max_price,
        ':goods_name' => $goods_name_like,
        ':brand_index' => $brand_index,
    ]);

    $brands_names->execute();

    $GLOBALS['all_goods'] = $all_goods->fetchAll(PDO::FETCH_ASSOC);
    $GLOBALS['brands_names'] = $brands_names->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
