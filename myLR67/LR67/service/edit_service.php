<?php
require_once "goods_class.php";
require_once "../db_class.php";
require_once "../type_class.php";
require_once "main_logic.php";
require_once "../head.php";

if(isset($_GET['id']))
{
    $elem = Goods::get_by_id($_GET['id']);
    $row = $elem[0];
    $service_id = $row['id'];
    $img_path = $row['img_path'];
    $service_name = $row['name'];
    $description = $row['description'];
    $cost = $row['cost'];
    $type_name = $row['type_name'];
}
?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../sportshop.php">Каталог товаров</a></li>
            <li class="breadcrumb-item active" aria-current="page">Новый товар</li>
        </ol>
    </nav>

    <?php if (isset($errors) && count($errors) != 0): ?>
    <div class="alert alert-danger mb-3">
        <?php foreach ($errors as $elem): ?>
            <p><?php echo htmlspecialchars($elem) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (isset($errors) && count($errors) == 0): ?>
    <div class="alert alert-success mb-3">Запись успешно отредактирована</div>
<?php endif; ?>

<h1 class="mb-4">Редактировать услугу "<?php echo htmlspecialchars($service_name) ?>"</h1>
<form method="post" action="" class="row g-3" enctype="multipart/form-data">

    <div class="col-md-6">
        <label for="img" class="form-label">Изображение</label>
        <input class="form-control" type="file" id="img" name="img">
    </div>

    <div class="col-md-6">
        <label for="name" class="form-label">Наименование товара</label>
        <input class="form-control" type="text" id="name" name="name" value="<?php echo htmlspecialchars($service_name) ?>" placeholder="Введите наименование товара">
    </div>

    <div class="col-md-6">
        <label for="type" class="form-label">Тип услуги</label>
        <select class="form-select" id="type" name="type">
            <?php
            $arr = Type::show();
            foreach ($arr as $elem) {
                $selected = $type_id == $elem['id_type'] ? 'selected' : '';
                echo "<option value='" . $elem['id_type'] . "' $selected>" . htmlspecialchars($elem['name_type']) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="des" class="form-label">Описание</label>
        <input class="form-control" type="text" id="des" name="des" value="<?php echo htmlspecialchars($description) ?>" placeholder="Введите описание товара">
    </div>

    <div class="col-md-6">
        <label for="cost" class="form-label">Стоимость</label>
        <input class="form-control" type="text" id="cost" name="cost" value="<?php echo htmlspecialchars($cost) ?>" placeholder="Введите стоимость">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary w-100" id="submit" value="<?php echo htmlspecialchars($img_path) ?>" name="edit_">Сохранить изменения</button>
    </div>
</form>
