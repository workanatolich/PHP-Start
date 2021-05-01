<?php

$arr = ['1.txt', '2.txt', '3.txt'];
foreach ($arr as $item) {
    var_dump(filesize($item));
    echo '<br>';
}
