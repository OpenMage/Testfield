#!/usr/bin/env bash

./vendor/bin/phpunit -c ./tests/Unit/phpunit.xml.dist --testsuite=Unit --debug --log-junit output/junit-unit-report.xml
