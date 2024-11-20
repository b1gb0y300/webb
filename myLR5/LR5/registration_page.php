<?php
require_once "reg_logic.php";

if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

include "head.php";
?>

<div class="container col-5 mx-auto">
    <h2>Регистрация</h2>
    <?php if (!$correct_registration): ?>
        <div class="alert alert-danger mb-3">
            <?= $error_message ?>
        </div>
    <?php endif ?>
    <form method="post" action="">
        <div class="row">
            <div class="col">
                <label>Фамилия:</label>
                <input class="form-control" name="last_name" type="text" id="last_name" value=<?php echo htmlspecialchars(isset($_POST['last_name']) ? $_POST['last_name'] : ''); ?>>
            </div>
            <div class="col">
                <label>Имя:</label>
                <input class="form-control" name="first_name" type="text" id="first_name" value=<?php echo htmlspecialchars(isset($_POST['first_name']) ? $_POST['first_name'] : ''); ?>>
            </div>
        </div>

        <label class="mt-2">Отчество:</label>
        <input class="form-control" name="patronymic" type="text" id="patronymic" value=<?php echo htmlspecialchars(isset($_POST['patronymic']) ? $_POST['patronymic'] : ''); ?>>

        <label class="mt-2">Дата рождения:</label>
        <input class="form-control" name="birth_date" type="date" id="birth_date" value=<?php echo htmlspecialchars(isset($_POST['birth_date']) ? $_POST['birth_date'] : ''); ?>>
   
        <label class="mt-2">Адрес:</label>
        <input class="form-control" name="address" type="text" id="address" value=<?php echo htmlspecialchars(isset($_POST['address']) ? $_POST['address'] : ''); ?>>
   
        <label class="mt-2">Интересы:</label>

        <div class="input-group">
            <textarea class="form-control" aria-label="With textarea" name="interests" type="text" id="interests" value=<?php echo htmlspecialchars(isset($_POST['interests']) ? $_POST['interests'] : ''); ?>></textarea>
        </div>
        
        <label class="mt-2">Пол:</label>
        <select name="gender" class="form-control">
            <option value='' selected></option>
            <option value="0">Мужчина</option>
            <option value="1">Женщина</option>
        </select>
  
        <label class="mt-2">Введите логин:</label>
        <input class="form-control" name="login" type="text" id="login" required value=<?php echo htmlspecialchars(isset($_POST['login']) ? $_POST['login'] : '') ?>>
    
        <label class="mt-2">Группа крови:</label>
        <select name="blood_type" class="form-control">
            <option value='' selected></option>
            <option value="1">0 (I)</option>
            <option value="2">A (II)</option>
            <option value="3">B (III)</option>
            <option value="4">AB (IV)</option>
        </select>
     
        <label class="mt-2">Резус-фактор:</label>
        <select name="rh_factor" class="form-control">
            <option value='' selected></option>
            <option value="0">Положительный (+)</option>
            <option value="1">Отрицательный (-)</option>
        </select>
    
        <label class="mt-2">Ссылка на профиль ВК:</label>
        <input class="form-control" name="vk_profile" type="text" id="vk_profile" value=<?php echo htmlspecialchars(isset($_POST['vk_profile']) ? $_POST['vk_profile'] : '') ?>>
    
        <label class="mt-2">Введите пароль:</label>
        <input class="form-control" name="password1" type="password" id="password1" required>
    
        <label class="mt-2">Повторите пароль:</label>
        <input class="form-control" name="password2" type="password" id="password2" required>
        <div class="text-center">
            <button type="submit" class="form-control btn btn-primary btn-sm fw-bold mx-auto mt-3" name="submit" value="submit">Зарегистрироваться</button>
        </div>  

    </form>
    <div class="text-center">
        <label>Уже есть аккаунт? </label>
        <a href="auth_page.php">Авторизируйтесь!</a>
    </div>

</div>
</body>

</html>