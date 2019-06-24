#!/usr/bin/env bash

echo "Installing composer dependencies"
composer install

echo "Test results"
bash ./vendor/bin/phpunit

echo "Prepare your inputs"
php index.php
