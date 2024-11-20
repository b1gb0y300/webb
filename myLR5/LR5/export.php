<?php
include "export_logic.php";
include "head.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST" action="">
        <div class="form-group">
            <label for="path_to_save">Путь для сохранения экспортированной таблицы:</label>
            <input type="text" class="form-control" id="path_to_save" name="path_to_save" placeholder="/upload/exported_data.xml" required>
        </div>
        <button type="submit" class="btn btn-primary">Экспортировать</button>
    </form>

    <!-- Вывод сообщения об успехе или ошибке -->
    <?php if (isset($out_string)): ?>
            <p style="color: green;"><?php echo $out_string; ?></p>
        <?php endif; ?>
        
        <?php if (isset($error_string)): ?>
            <p style="color: red;"><?php echo $error_string; ?></p>
        <?php endif; ?>

    </body>
</html>
