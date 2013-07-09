<?php
require_once 'config.php';
require_once 'functions.php';
require_once 'database.php';

syslog(LOG_INFO, 'Running warmup...');

// 1. Create database tables
syslog(LOG_INFO, 'Creating database tables...');
try {
    $db->query('CREATE TABLE url (
        id INT NOT NULL AUTO_INCREMENT,
        identifier VARCHAR(10) NOT NULL,
        url VARCHAR(1000) NOT NULL,
        PRIMARY KEY (id)
    );');

    syslog(LOG_INFO, 'Created database table "url".');
} catch (PDOException $e) {
    syslog(LOG_INFO, 'Database table "url" already exists.');
}
syslog(LOG_INFO, 'Created database tables.');

// 2. Warmup cache
syslog(LOG_INFO, 'Warming up cache...');

$memcache = new Memcache();

$lastShortened = array();
$sql = 'SELECT identifier, url FROM url ORDER BY id DESC';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $memcache->set('url:byid:' . $row['identifier'], $row['url']);

        if (count($lastShortened) <= 5) {
            array_push($lastShortened, $row['identifier']);
        }
    }
    $stmt = null;
}
catch (PDOException $e) {
    print $e->getMessage();
}
$memcache->set('homepage:list', $lastShortened);

syslog(LOG_INFO, 'Warmed up cache.');

syslog(LOG_INFO, 'Finished warmup.');