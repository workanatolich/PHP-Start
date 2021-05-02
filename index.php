<?php

$sum = array_sum(file('test1.txt', FILE_IGNORE_NEW_LINES));
file_put_contents('test1.txt', file_get_contents('test1.txt') .PHP_EOL .$sum);