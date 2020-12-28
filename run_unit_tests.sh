#!/usr/bin/env bash

./vendor/bin/phpunit -c ./tests/Unit/phpunit.xml.dist --testsuite=Unit -vvv --log-junit output/junit-unit-report.xml
