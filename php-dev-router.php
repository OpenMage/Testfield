<?php

$_SERVER['MAGE_IS_DEVELOPER_MODE'] = true;

if (preg_match('/\.(?:png|jpg|jpeg|gif|ico)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} elseif (preg_match('/\.(?:js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} elseif (preg_match('/^\/index\.php(\/)?/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else {
    chdir(__DIR__.'/magento/');
    include(__DIR__.'/magento/index.php');
//    header('HTTP/1.0 404 Not Found');
//    echo "<p>Welcome to PHP</p>";
//    var_dump($_SERVER["REQUEST_URI"]);
}