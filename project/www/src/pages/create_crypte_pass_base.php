<?php
include __DIR__.'/src/class/classMain/SGBD_crypt.php';

$allkey = SGBD_crypt::createKey_pass("secret");
echo "<pre>";
print_r($allkey);
echo "</pre>";