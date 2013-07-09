<?php
$db = null;
try {
    $db = new PDO('mysql:unix_socket=/cloudsql/<database>;charset=utf8;dbname=shortnr', '<username>', '<password>');
    syslog(LOG_DEBUG, 'Connected to database.');
} catch (PDOException $e) {
    syslog(LOG_ERR, 'Failed to get PDO DB handle: ' . $e->getMessage());
    exit;
}