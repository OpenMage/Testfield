#!/usr/bin/env bash
./vendor/bin/phpunit

curl 127.0.0.5:8080

curl 127.0.0.5:8080/index.php
