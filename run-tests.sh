#!/bin/bash

php -S localhost:8080 &
PHP_PID=${!}

cd tests

codecept -vvv build
codecept -vvv run

kill ${PHP_PID}
