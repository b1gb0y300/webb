<?php
set_time_limit(500);
$text = '';

if (isset($_GET['preset']))
{
    global $presets;
    $presets= [
        1 => [
            "url" => "https://ru.wikipedia.org/wiki/Киноринхи",
            "container" => "mw-parser-output"
        ],
        2 => [
            "url" => "https://www.gazeta.ru/culture/2021/12/16/a_14322589.shtml",
            "container" => "b_article"
        ],
        3 => [
            "url" => "https://mishka-knizhka.ru/skazki-dlay-detey/zarubezhnye-skazochniki/skazki-alana-milna/vinni-puh-i-vse-vse-vse/#glava-pervaya-v-kotoroj-my-znakomimsya-s-vinni-puhom-i-neskolkimi-pchy",
            "container" => "entry-content"
        ]
    ];
}
elseif (isset($_POST['text']))
{
    $text = $_POST['text'];
}


