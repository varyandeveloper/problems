<?php

require_once __DIR__ . '/vendor/autoload.php';

if (PHP_SAPI === 'cli') {

    if (!defined('STDIN')) {
        define('STDIN', fopen('php://stdin', 'r'));
    }

    $tour = new \VS\Tourist\Tour();
    $tour->askForPersons();
    $tour->askForAdvices();

    $tourist = new \VS\Tourist\Tourist\Tourist(...$tour->getAdvices());
    $tourist->calculate();

    echo PHP_EOL . implode(' ', $tourist->getCalculatedCoordinates()) . ' ' . number_format($tourist->getMaxStraightLineAndAverageDirectionDiff(), 4) . PHP_EOL;
} else {
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>

    </body>
    </html>
<?php
}
