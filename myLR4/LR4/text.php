<?php
require_once "head.php";
require_once "text_logic.php"
?>

<div class="container text-center mt-3 col-6 rounded border br-3 bg-light p-3">
    <form method="post" action="text.php">
        <p>Введите текст:</p>
        <textarea class="form-control" name="text" type="text" id="text"></textarea>
        <br/>
        <button class="form-control fw-bold btn btn-primary" type="submit" name="submit" value="submit">Выполнить</button>
    </form>
</div>
<h2>Задание 5:</h2>
    <div>
        <?php echo $text_processing->Task5()?>
    </div>
<h2>Задание 6:</h2>
    <div>
        <?php echo $text_processing->Task6()?>
    </div>
<h2>Задание 13:</h2>
    <div>
        <?php echo $text_processing->Task13()?>
    </div>
<h2>Задание 17:</h2>
    <div>
        <?php echo $text_processing->Task17()?>
    </div>
</body>
</html>
