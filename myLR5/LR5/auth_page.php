<?php
require_once "auth_logic.php";

if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

require_once "head.php";
?>
<div class="container mt-4 col-5 p-3">
    <h2 class="text-center">Авторизация</h2>
    <?php if(!$correct_auth): ?>
    <div class="alert alert-danger mb-3">
        <?=$error_message?>
    </div>
    <?php endif?>
    <form method="post" action="">
        <p class="mt-3">Введите логин:</p>
        <input class="form-control" name="login" type="text" id="login" required/>
        <p class="mt-3">Введите пароль:</p>
        <input class="form-control" name="password" type="password" id="password" required/>
        <br/>
        <div class="text-center">
            <button class="form-control btn btn-primary btn-sm fw-bold mx-auto" type="submit" name="submit" value="submit">Войти</button>
        </div>
        
    </form>
</div>
</body>
</html>