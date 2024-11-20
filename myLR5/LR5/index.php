<?php session_start(); ?>
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
                        <!-- <div class="col-auto px-2">
                            <p>АЛЬПИНИЗМ</p>
                        </div> -->
                        <!-- <div class="col-auto px-2"><p>БЕГ</p></div>
                    <div class="col-auto px-2"><p>ГОРНЫЕ ЛЫЖИ</p></div>
                    <div class="col-auto px-2"><p>СНОУБОРД</p></div>
                    <div class="col-auto px-2"><p>БРЕНДЫ</p></div> -->
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col d-flex align-items-center justify-content-end col_icons">

                            <?php if (!isset($_SESSION['login'])): ?>
                                <a href="auth_page.php" class="nav-link link-dark px-0">
                                    <p class="mb-1 me-3">войти</p>
                                </a>
                                <p class="mb-1 me-3">|</p>
                                <a href="registration_page.php" class="nav-link link-dark px-0">
                                    <p class="mb-1 me-3">зарегистрироваться</p>
                                </a>

                            <?php else: ?>

                                <a href="#" class="nav-link link-dark px-1">
                                    <p class="mb-1 me-3">вы авторизованы как <?php echo $_SESSION['login'] ?></p>
                                </a>
                                <p class="mb-1 me-3">|</p>
                                <a href="logout.php" class="nav-link link-dark px-1">
                                    <p class="mb-1 me-3">выйти</p>
                                </a>

                            <?php endif ?>
                            <p class="mb-1 me-3">|</p>
                            <a href="sportshop.php" class="nav-link link-dark px-1">
                                <p class="mb-1 me-3">секретная страница</p>
                            </a>
                            <!-- <p class="mb-0 me-3">вход</p> -->
                            <img width="26" height="32" src="icons/bin.png" alt="" class="me-2">
                            <img width="30" src="icons/like.png" alt="" class="me-2">
                            <img width="30" src="icons/search.png" alt="">
                        </div>
                    </div>
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
        <div class="container">
            <div class="row ms-4 mt-2">
                <div class="col ms-5 mt-5">
                    <img width="400" src="images/image.png" alt="">
                </div>
                <div class="col info_bar">
                    <img width="132" height="28" src="icons/logo_camp.png" alt="">
                    <div class="row mt-4">
                        <h2>Страховочная система C.A.M.P. Impulse Orange</h2>
                    </div>
                    <div class="row mt-4">
                        <p>К сожалению, данный товар закончился. Давайте подберём альтернативный вариант<br> в этой же
                            <span class="underline">категории товаров</span>.</p>
                    </div>

                </div>

                <div class="row mt-5 consult">
                    <div class="col consult-col d-flex flex-column align-items-center">
                        <img class="mt-5 me-4" width="61" height="62" src="icons/clock.png" alt="">

                        <h3 class="mt-3 me-5">Профессиональная консультация</h3>

                        <p class="">Вся команда нашего магазина увлекается активными видами спорта: туризмом,
                            альпинизмом, горными лыжами и другими<br> видами outdoor-активности</p>

                    </div>
                    <div class="col consult-col d-flex flex-column align-items-center">
                        <img class="mt-5 " width="108" height="48" src="icons/helicopter.png" alt="">

                        <h3 class="mt-3">Доставка и оплата</h3>

                        <p class="">Оплата наличными курьеру или банковской<br> картой без комиссии</p>

                    </div>
                    <div class="col ps-5 consult-col d-flex flex-column align-items-center">
                        <img class="mt-5 " width="62" height="62" src="icons/mail.png" alt="">

                        <h3 class="mt-3">Подписка на новости</h3>

                        <p class="">Коротко о самом важном: новых коллекциях<br> и брендах, о снаряжении и как его
                            выбрать, ближайших акциях и распродажах</p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Ваш e-mail" aria-label="Ваш e-mail">
                            <button class="btn btn-primary" type="button">Подписаться</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text_p">
                <p>Заметили ошибку? Выделите текст ошибки, нажмите Ctrl+Enter, отправьте форму. Мы постараемся исправить
                    ее.</p>
            </div>
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