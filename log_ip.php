<?php
$ip = $_SERVER['REMOTE_ADDR'];
$logfile = 'ip_log.txt';

file_put_contents($logfile, $ip . PHP_EOL, FILE_APPEND);
?>
