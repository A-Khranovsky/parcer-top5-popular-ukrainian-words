<?php

$source = <<<SOURCE
основний елемент ферма гау є пояс верхній і ніжній майже завжди він паралельний
проте для великий прогон є приклад полігональний у цей випадок конструкція
ферма значно ускладнюватися і вона втратити одна зі свій перевага простота
виготовлення і монтаж крім той полігональний ферма неможливо
SOURCE;

$words = [];
$pattern = '/([а-яіїє]+)/ui'; //все слова
preg_match_all($pattern, $source, $words);
//echo !empty($words) ? count($words[0]) : null;

//var_dump($words[0]);

//echo preg_match_all('/\bі\b/ui',$source);

$result = [];
foreach ($words[0] as $word) {
    $result[$word] = preg_match_all('/\b' . $word . '\b/ui', $source);
}
//arsort($result);

function f($source, &$number)
{
    foreach ($source as $key => $item) {
        if ($item == $number) {
            yield $key;
        }
    }
}

$buff = [];
for ($i = 1; $i <= 3; $i++) {
    $q = f($result, $i);
    foreach ($q as $item) {
        $buff[$i][] = $item;
    }
}

var_dump($buff);
//$pattern = '/[^\s]/u'; //вск букві без пробелов
//preg_match_all($pattern, $source, $matches);
//if (!empty($matches)) {
//    var_dump($matches[0]);
//}

//$pattern = '/(.|\s)/u'; //все буквы и пробелы
//preg_match_all($pattern, $source, $matches);
//if (!empty($matches)) {
//    var_dump($matches[0]);
//}

