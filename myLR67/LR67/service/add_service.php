<?php
require_once "../db_class.php";
require_once "../type_class.php";
require_once "main_logic.php";
require_once "../head.php";
?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../sportshop.php">Каталог товаров</a></li>
            <li class="breadcrumb-item active" aria-current="page">Новый товар</li>
        </ol>
    </nav>
    <?php if(isset($errors) and count($errors) != 0):?>
        <div class="alert alert-danger mb-3">
            <?php foreach ($errors as $elem)
                echo $elem."</br>"
            ?>
        </div>
    <?php endif?>
    <?php if(isset($errors) and count($errors) == 0):?>
        <div class="alert alert-success mb-3"> Запись успешно добавлена</div>
    <?php endif?>
    <h1>Добавить услугу</h1>

    <form method="post" action="" class="row g-3" enctype="multipart/form-data">

    <div class="col-md-6">
        <label for="img" class="form-label">Изображение товара</label>
        <input class="form-control" type="file" id="img" name="img" required>
    </div>

    <div class="col-md-6">
        <label for="name" class="form-label">Наименование товара</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Введите наименование" required>
    </div>

    <div class="col-md-6">
        <label for="type" class="form-label">Тип товара</label>
        <select class="form-select" id="type" name="type">
            <?php
            $arr = Type::show();
            foreach ($arr as $elem) {
                echo "<option value='" . $elem['id_type'] . "'>" . $elem['name_type'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="des" class="form-label">Описание</label>
        <input class="form-control" type="text" id="des" name="des" placeholder="Введите описание">
    </div>

    <div class="col-md-6">
        <label for="cost" class="form-label">Стоимость</label>
        <input class="form-control" type="text" id="cost" name="cost" placeholder="Введите стоимость" required>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary w-100" id="submit" value="add" name="add">Отправить</button>
    </div>
</form>

</div>