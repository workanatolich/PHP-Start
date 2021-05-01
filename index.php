<?php

$arr = ['1.txt', '2.txt'];
foreach ($arr as $elem) {
    file_put_contents("$elem", '');
}
