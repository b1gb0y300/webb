<?php
    session_start();
    if (empty($_SESSION['login'])) {
        header("Location:registration_page.php");
        die;
    }
require_once "logic.php";
    ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страховочная система C.A.M.P. Impulse Orange - купить в магазине Спорт-Марафон с доставкой по России
        (арт.2936)</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <link href="https://db.onlinewebfonts.com/c/595030bb520f1e2ab2fb4e8d7c5f30a5?family=ALS+Sector+Regular+Regular"
        rel="stylesheet">

    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">



    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>

        <div class="container">
            <div class="row pt-3 justify-content-end up_nav ">
                <div class="col-auto ps-small">
                    <p>Доставка и оплата</p>
                </div>
                <div class="col-auto ps-small">
                    <p>Контакты</p>
                </div>
                <div class="col-auto ps-small">
                    <p>Сервис</p>
                </div>
                <div class="col-auto ps-small">
                    <p>Блог</p>
                </div>
                <div class="col-auto ps-small">
                    <p>Клуб</p>
                </div>
                <div class="col-auto ps-small">
                    <p>YouTube</p>
                </div>
                <div class="col-auto ps-small">
                    <p>Fest</p>
                </div>
                <div class="col-auto ps-small">
                    <p>Подкасты</p>
                </div>
                <div class="col-auto ps-small">
                    <p>Парк</p>
                </div>
                <div class="col-auto ">
                    <p>О магазине</p>
                </div>
            </div>


            <div class="row logo_row">
                <div class="col">
                    <img src="icons/logo.png" alt="">
                    <img class="logo_main" src="icons/text_logo.png" alt="">
                </div>
            </div>


            <div class="row">
                <div class="col-11">
                    <div class="row nav_bar mx-0 mt-3">
                        <div class="col-auto px-2">
                            <p>НОВИНКИ</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>SALE</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>КАТАЛОГ</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>ОДЕЖДА</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>ОБУВЬ</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>ТУРИЗМ</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>АЛЬПИНИЗМ</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>БЕГ</p>
                        </div>
                        <!-- <div class="col-auto px-2"> было убрано для симпатичного отображения сообщение о пользователе 
                            <p>ГОРНЫЕ ЛЫЖИ</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>СНОУБОРД</p>
                        </div>
                        <div class="col-auto px-2">
                            <p>БРЕНДЫ</p>
                        </div> -->
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col d-flex align-items-center justify-content-end col_icons">
                            <a href="#" class="nav-link link-dark">
                                <p class="mb-0 me-3">
                                    Вы авторизованы как <?php echo $_SESSION['login']?>
                                </p>
                            </a>
                            <p class="mb-0 me-3">|</p>
                            <a href="logout.php" class="nav-link link-dark">
                                <p class="mb-0 me-3">
                                    выйти            
                                </p>
                            </a> 
                            <img width="26" height="32" src="icons/bin.png" alt="" class="me-2">
                            <img width="30" src="icons/like.png" alt="" class="me-2">
                            <img width="30" src="icons/search.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-end">
                <div class="col-auto pt-4 text-center" >
                    <button type="submit" class="btn btn-primary btn-sm">
                        <a href="export.php" class="nav-link">Экспорт данных</a>
                    </button>
                </div>
                <div class="col-auto pt-4 text-center" >
                    <button type="submit" value="Reset" name="reset" class="btn btn-primary btn-sm">
                        <a href="import.php" class="nav-link">Импорт данных</a>
                    </button>
                </div>
            </div>

            <div class="row mt-3 nav_index">
                <div class="col-auto px-1">
                    <p>Главная</p>
                </div>
                <div class="col-auto px-1">
                    <p>>Каталог</p>
                </div>
                <div class="col-auto px-1">
                    <p>>Альпинистское снаряжение</p>
                </div>
                <div class="col-auto px-1">
                    <p>>Страховочное снаряжение</p>
                </div>
                <div class="col-auto px-1">
                    <p>>Страховочные системы</p>
                </div>
                <div class="col-auto px-1">
                    <p>>Страховочная система C.A.M.P. Impulse Orange</p>
                </div>
            </div>
        </div>
    </header>

    <main>


        <div class="container border-bottom">
            <form method="GET" action="" class="mb-4 pt-5">
                <div class="row justify-content-center text-center">
                    <div class="col-2 d-flex flex-column align-items-center">
                        <label for="min_cost" class="text-black">Минимальная цена:</label>
                        <input type="text" class="form-control mb-2" id="min_cost" name="min_price"
                            value="<?php echo htmlspecialchars($_GET['min_price'] ?? '') ?>">
                    </div>
                    <div class="col-2 d-flex flex-column align-items-center">
                        <label for="max_cost" class="text-black">Максимальная цена:</label>
                        <input type="text" class="form-control mb-2" id="max_cost" name="max_price"
                            value="<?php echo htmlspecialchars($_GET['max_price'] ?? '') ?>">
                    </div>

                    <div class="col-10 d-flex flex-column align-items-center">
                        <label for="goods_name" class="text-black">Поиск по названию:</label>
                        <input type="text" class="form-control mb-2" id="goods_name" name="goods_name"
                            value="<?php echo htmlspecialchars($_GET['goods_name'] ?? '') ?>">

                        <label class="text-black mt-2">Фильтрация по виду товара:</label>
                        <select name='type' class='form-control'>
                            <option value='' selected> Выберите вид товара</option>
                            <?php
                            foreach ($GLOBALS['types_names'] as $item) {
                                echo "<option value='{$item['id_type']}' ";
                                if (isset($_GET['type']) && $_GET['type'] == "{$item['id_type']}") {
                                    echo "selected";
                                }
                                echo ">{$item['name_type']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mx-2 btn-sm">Применить фильтры</button>
                    <button type="submit" value="Reset" name="reset" class="btn btn-danger mx-2 btn-sm">Сбросить
                        фильтры</button>
                </div>
            </form>
        </div>

        <div class="container text-center mt-3">
            <?php if ($GLOBALS['all_goods']): ?>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Изображение</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Вид товара</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Цена ₽</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($GLOBALS['all_goods'] as $item): ?>
                            <tr>
                                <th scope="row">
                                    <img width="200" height="125" class="object-fit-cover"
                                        src="<?= htmlspecialchars($item['img_path']) ?>" style="max-width: 150px;">

                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['type_name']) ?></td>
                                <td><?= htmlspecialchars($item['description']) ?></td>
                                <td><?= htmlspecialchars($item['cost']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>




    </main>

    <footer>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <div class="row footer_h3 mb-3">
                        <h3><span>КАТАЛОГ</span></h3>
                    </div>
                    <div class="row footer_row">
                        <p>Акции</p>
                    </div>
                    <div class="row footer_row">
                        <p>Новинки</p>
                    </div>
                    <div class="row footer_row">
                        <p>Активности</p>
                    </div>
                    <div class="row footer_row">
                        <p>Бренды</p>
                    </div>
                    <div class="row footer_row">
                        <p>Лукбук</p>
                    </div>
                    <div class="row footer_row">
                        <p>Идеи подарков</p>
                    </div>
                    <div class="row footer_row">
                        <p>Подарки для ваших сотрудников</p>
                    </div>
                    <div class="row footer_row">
                        <p>Библиотека Спорт-Марафон</p>
                    </div>
                </div>

                <div class="col">
                    <div class="row footer_h3 mb-3">
                        <h3><span>МАГАЗИН</span></h3>
                    </div>
                    <div class="row footer_row">
                        <p>Контакты</p>
                    </div>
                    <div class="row footer_row">
                        <p>О нас</p>
                    </div>
                    <div class="row footer_row">
                        <p>Команда</p>
                    </div>
                    <div class="row footer_row">
                        <p>Вакансии</p>
                    </div>
                </div>
                <div class="col">
                    <div class="row footer_h3 mb-3">
                        <h3>СЕРВИС</h3>
                    </div>
                    <div class="row footer_row">
                        <p>Персональная консультация</p>
                    </div>
                    <div class="row footer_row">
                        <p>Скибиди-сервис</p>
                    </div>
                    <div class="row footer_row">
                        <p>Бутфитинг</p>
                    </div>
                    <div class="row footer_row">
                        <p>Мастерская бега</p>
                    </div>
                </div>
                <div class="col">
                    <div class="row footer_h3 mb-3">
                        <h3>Сообщество</h3>
                    </div>
                    <div class="row footer_row">
                        <p>Блог</p>
                    </div>
                    <div class="row footer_row">
                        <p>Клуб</p>
                    </div>
                    <div class="row footer_row">
                        <p>YouTube</p>
                    </div>
                    <div class="row footer_row">
                        <p>Подкасты</p>
                    </div>
                    <div class="row footer_row">
                        <p>Outdoor Fest в Никола-Ленивце</p>
                    </div>
                    <div class="row footer_row">
                        <p>Проекты в Красной Поляне</p>
                    </div>
                    <div class="row footer_row">
                        <p>Парк</p>
                    </div>
                    <div class="row footer_row">
                        <p>Школа туризма</p>
                    </div>
                </div>
                <div class="col">
                    <div class="row footer_h3 mb-3">
                        <h3>ИНФОРМАЦИЯ</h3>
                    </div>
                    <div class="row footer_row">
                        <p>Дисконтная программа</p>
                    </div>
                    <div class="row footer_row">
                        <p>Доставка и оплата</p>
                    </div>
                    <div class="row footer_row">
                        <p>Обмен и возврат</p>
                    </div>
                    <div class="row footer_row">
                        <p>Осторожно,<br> мошенники</p>
                    </div>
                    <div class="row footer_row">
                        <p>Оферта</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row footer_h3 mb-3">
                        <h3><span>КОНТАКТЫ</span></h3>
                    </div>
                    <div class="row black_text">
                        <p><span>Москва, ул. Сайкина 4</span><br>
                            ежедневно с 10:00 до 24:00</p>
                    </div>
                    <div class="row footer_h3 black_text">
                        <p><span>8 (800) 333-14-41</span><br>
                            бесплатный звонок по России</p>
                    </div>
                    <div class="row mb-0 pb-0 black_text">
                        <p><span>Мы в социальных сетях</span></p>
                    </div>
                    <img class="pb-3" width="20" src="icons/vk.png" alt="">
                    <div class="row black_text">
                        <p><span>Наши каналы</span></p>
                    </div>
                    <img width="22" height="16" src="icons/youtube.png" alt="">
                    <img class="ms-3" width="22" height="22" src="icons/ya.png" alt="">
                    <img class="ms-3" width="22" height="20" src="icons/tg.png" alt="">

                </div>
            </div>
            <div class="row mb-5 mt-5">
                <div class="col">
                    <p class=" under_text">Все права защищены. 2012-2024 © Спорт-Марафон</p>
                </div>
                <div class="col">
                    <img src="icons/rating.png" alt="">
                </div>
                <div class="col-auto mb-5 d-flex align-items-center">
                    <img src="icons/lebedev.png" alt="Лебедев" class="me-3">
                    <p class="mb-2 under_text">Задизайнено в <span>Студии Артемия Лебедева<br>Информация о сайте</span>
                    </p>
                </div>

            </div>
        </div>
    </footer>

</body>

</html>