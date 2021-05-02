<?php

function getFiles($dir): array
{
    $files = array_diff(scandir($dir), ['.', '..']);
    $result = [];

    foreach ($files as $file) {
        $path = $dir.'/'.$file;
        if(is_dir($path)) {
            $result = array_merge($result, getFiles($path));
        }
        else {
            $result[] = $path;
        }
    }

    return $result;
}

$files = getFiles('dir');
foreach ($files as $file) {
    file_put_contents($file, file_get_contents($file) .'!');
}