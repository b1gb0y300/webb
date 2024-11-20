<?php
include "import_logic.php";
include "head.php";
?>
        <form method="POST" action="">
            <span>XML файл на импорт, введите путь: </span>
            <input name="file_name" type="text" placeholder="files/services_exported.xml" required>
            <input name="import" type="submit" value="Импорт" />
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
