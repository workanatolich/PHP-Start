<?php

copy('old.txt', 'dir/copy.txt');
echo file_get_contents('dir/copy.txt');