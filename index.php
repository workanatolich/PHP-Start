<?php

$arr = ['copy.txt', 'old.txt', 'dir/copy.txt'];
foreach ($arr as $item) {
    unlink($item);
}
