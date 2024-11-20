<?php
include "presets.php";
$text_processing = new text_processing($text);

class text_processing
{
    public $original_text;
    public $dom;
    public $xpath;
    public $container_name;

    public function __construct($text)
    {
        $this->original_text = $text;
        $this->dom = new DOMDocument();

        if (isset($_GET['preset'])) {
            $cur_preset = $GLOBALS['presets'];
            $url = $cur_preset[$_GET['preset']]["url"];
            $this->original_text = file_get_contents($url);
            $this->original_text = mb_convert_encoding($this->original_text, 'UTF-8', null);
            libxml_use_internal_errors(true);
            $this->container_name = $cur_preset[$_GET['preset']]["container"];
            $this->dom->loadHTML('<meta charset="utf8">' . $this->original_text);
            $this->xpath = new DOMXPath($this->dom);
            $elements = $this->xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $this->container_name ')]");

            $this->original_text = '';

            foreach ($elements as $element) {
                $this->original_text .= $this->dom->saveHTML($element);
            }
        } else {
            $this->original_text = mb_convert_encoding($this->original_text, 'UTF-8', null);
            if ($this->original_text != '') {
                @$this->dom->loadHTML('<meta charset="utf8">' . $this->original_text);
            } else {
                @$this->dom->loadHTML(' ');
            }
        }
    }

    public function Task5()
    {
        // Создаем отдельную копию текста для задания
        $text_copy = $this->original_text;

        // Заменяем тире, вставленное минусом между двумя пробелами, на среднее тире (&ndash;)
        $text_copy = preg_replace('/(?<=\s)-(?=\s)/', ' &ndash; ', $text_copy);

        // Заменяем двойной минус между пробелами на длинное тире (&mdash;), привязывая его к предыдущему слову неразрывным пробелом
        $text_copy = preg_replace('/(?<=\s)--(?=\s)/', '&nbsp;&mdash;', $text_copy);

        return $text_copy;
    }

    public function Task6()
    {
        // Создаем отдельную копию текста для задания
        $text_copy = $this->original_text;

           // Расставляем запятые перед "а" и "но", если перед ними нет запятой и они не стоят в начале строки
    $text_copy = preg_replace('/(?<![,\s])\s+(а|но)(?=\s|$)/ui', ', $1', $text_copy);

    // Заменяем три точки на спецзнак многоточия (&hellip;)
    $text_copy = preg_replace('/\.{3}/', '&hellip;', $text_copy);

    return $text_copy;
    }

    public function Task13()
    {
        // Создаем отдельную копию текста для задания
        $text_copy = $this->original_text;

        $count = 1;
        $dom = new DOMDocument();
        @$dom->loadHTML('<meta charset="utf8">' . $text_copy);
        $text_copy = preg_replace_callback('/<img/',
            function($match) use (&$count) {
                $str = "<img id='" . $count . "' ";
                $count++;
                return $str;
            }, $text_copy);
        $text_copy = preg_replace('/\s?<script[^>]*?>.*?<\/script>\s?/si', " ", $text_copy);
        $arr_img = $dom->getElementsByTagName('img');
        $out_str = "";
        $i = 1;
        foreach ($arr_img as $elem) {
            $test = $elem->getAttribute('alt');
            if ($test == "") {
                $out_str .= '<a href="#' . $i . '"> Картинка номер ' . $i . ' "без описания"</a></p>';
            } else {
                $out_str .= '<a href="#' . $i . '"> Картинка номер ' . $i . ' "' . $test . '</a>"</p>';
            }
            $i++;
        }
        return $out_str . $text_copy;
    }

    public function Task17()
{
    // Создаем копию текста для выполнения задания
    $text_copy = $this->original_text;

    // Регулярное выражение для поиска повторяющихся слов с учетом знаков препинания
    $text_copy = preg_replace_callback(
        '/\b(\w+)(([\s.,!?;:\-–]|&ndash;|&nbsp;&mdash;|-)+\1\b)+/ui',
        function ($matches) {
            // Разбиваем найденную группу на части (слова и разделители)
            $words = preg_split('/([\s.,!?;:\-–]|&ndash;|&nbsp;&mdash;|-)/u', $matches[0], -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            $highlighted = $words[0]; // Оставляем первое вхождение без изменений

            // Подсвечиваем каждое повторяющееся слово, начиная со второго
            for ($i = 1; $i < count($words); $i++) {
                if (preg_match('/^\w+$/u', $words[$i])) {
                    $words[$i] = '<span style="background-color: yellow;">' . $words[$i] . '</span>';
                }
                $highlighted .= $words[$i]; // Собираем итоговую строку
            }

            return $highlighted; // Возвращаем подсвеченный текст
        },
        $text_copy
    );

    return $text_copy;
}

    
    
}
