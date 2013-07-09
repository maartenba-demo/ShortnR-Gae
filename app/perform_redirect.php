<?php
$identifier = substr($requestedPage, 2);
syslog(LOG_INFO, '[' . $identifier . '] Request for identifier.');

$memcache = new Memcache();
$redirectUrl = $memcache->get('url:byid:' . $identifier);

if ($redirectUrl !== false) {
    syslog(LOG_INFO, '[' . $identifier . '] Request for identifier satisfied.');
    header('Location: ' . $redirectUrl);
} else {
    syslog(LOG_WARNING, '[' . $identifier . '] Request for identifier could not be satisfied.');
    die('Unknown identifier');
}