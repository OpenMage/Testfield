#!/usr/bin/env bash
php ./travis/install_magento.php

php -t magento/ -S 127.0.0.5:8080 php-dev-router.php&

