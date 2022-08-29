<?php

spl_autoload_register();

use App\Parcer;

define('SOURCE', <<<SOURCE
основний елемент ферма гау є пояс верхній і ніжній майже завжди він паралельний
проте для великий прогон є приклад полігональний у цей випадок конструкція
ферма значно ускладнюватися і вона втратити одна зі свій перевага простота
виготовлення і монтаж крім той полігональний ферма неможливо
SOURCE);


$obj = new Parcer(SOURCE);

foreach ($obj->parse() as $key => $value){
    echo 'Top ' . $key . ' are: ';
    foreach ($value as $item){
        echo $item . ' ';
    }
    echo "\n";
}
