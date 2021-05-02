<?php

function getSum($filename) {
    $data = file_get_contents($filename);
    $array = explode(PHP_EOL, $data);
    return array_sum($array);
}


file_put_contents('sum.txt', getSum('test1.txt'));

$arr = [1,2,3,4,5,6,7,8,9,10];
file_put_contents('test2.txt', implode(PHP_EOL, $arr));

