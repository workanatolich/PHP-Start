<?php

$files = array_diff(scandir('dir'), ['.','..']);

foreach ($files as $elem) {
    echo file_get_contents('dir/'.$elem) .'<br>';
}