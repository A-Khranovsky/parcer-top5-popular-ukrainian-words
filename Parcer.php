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

//$str = 'крімі';
//preg_match_all('/і/u', $str, $res, PREG_OFFSET_CAPTURE);
//var_dump($res);
////echo $str[9];
//exit;

function cmp($a, $b)
{
//    if (preg_match_all('/і/u', $a, $res, PREG_OFFSET_CAPTURE)) {
//
//        foreach ($res[0] as $r) {
//            if ($b[$r[1] + 1] == 'і') {
//                $b[$r[1] + 1] = 'и';
//            }
//
//        }
//        $a = preg_replace('/і/u', 'и', $a);
//
//    }
//
//    if (preg_match_all('/и/u', $a, $res, PREG_OFFSET_CAPTURE)) {
//
//        foreach ($res[0] as $r) {
//            if ($b[$r[1] + 1] == 'и') {
//                $b[$r[1] + 1] = 'з';
//            }
//
//        }
//        $a = preg_replace('/з/u', 'и', $a);
//
//    }
    $a = preg_replace(['/а/u','/б/u','/в/u','/г/u','/ґ/u','/д/u','/е/u','/є/u','/ж/u','/з/u','/и/u','/і/u','/ї/u','/й/u','/к/u','/л/u',
        '/м/u','/н/u','/о/u','/п/u','/р/u','/с/u','/т/u','/у/u','/ф/u','/х/u','/ц/u','/ч/u','/ш/u','/щ/u','/ь/u','/ю/u','/я/u',],
        ['X','Y','Z','[',']','^','_','`','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'], $a);
    $b = preg_replace(['/а/u','/б/u','/в/u','/г/u','/ґ/u','/д/u','/е/u','/є/u','/ж/u','/з/u','/и/u','/і/u','/ї/u','/й/u','/к/u','/л/u',
        '/м/u','/н/u','/о/u','/п/u','/р/u','/с/u','/т/u','/у/u','/ф/u','/х/u','/ц/u','/ч/u','/ш/u','/щ/u','/ь/u','/ю/u','/я/u',],
        ['X','Y','Z','[',']','^','_','`','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'], $b);
    file_put_contents('data.txt', $a . ' ' . $b . ' ' . ($a <=> $b) . PHP_EOL, FILE_APPEND);
    //return mb_strtoupper($a) <=> mb_strtoupper($b);
    return $a <=> $b;
}

$buff = [];
for ($i = 1; $i <= 3; $i++) {
    $q = f($result, $i);
    foreach ($q as $item) {
        $buff[$i][] = $item;
    }
    usort($buff[$i], 'cmp');
}

var_dump($buff);


function iisearcher($str)
{
    foreach ($str as $key => $item) {
        if ($item === 'ї') {
            yield $key;
        }
    }
}

//$alphbet = [
//    'а','б','в','г','д','е','є',
//    'ж','з','и','і','ї','й',
//    'к','л','м','н','о','п','р',
//    'с','т','у','ф','х','ц','ч',
//    'ш','щ','ь','ю','я'
//];
//foreach ($alphbet as $alpha){
//    echo $alpha . ' = ' . mb_ord($alpha). "\n";
//}

//$alphbet = [
//    'a','b','c','d','e','f','g',
//    'h','i','j','k','l','m',
//    'n','o','p','q','r','s','t',
//    'u','v','w','x','y','z'
//];
//foreach ($alphbet as $alpha){
//    echo $alpha . ' = ' . mb_ord($alpha). "\n";
//}
//
//
//echo chr(128);
//echo chr(129);
//echo chr(130);
//echo chr(131);
//echo chr(132);
//echo chr(133);
//echo chr(134);
//echo chr(135);
//echo chr(136);

//echo strcmp('зі', 'значно');
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

