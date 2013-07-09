<?php
require_once 'config.php';
require_once 'functions.php';
require_once 'database.php';

$requestedPage = substr($_SERVER['REQUEST_URI'], 1);
if ($requestedPage == '') {
    $requestedPage = 'index';
}

if (substr($requestedPage, 0, 1) == 'u') {
    require_once 'perform_redirect.php';
} else {
    require_once 'views/master.php';
}