<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$page = $_GET['page'];
include "dir/$page.php";