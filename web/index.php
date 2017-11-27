<?php
/**
 *
 * @var \Mco\Web\App $app
 */

define('BASE_PATH', dirname(__DIR__));

require dirname(__DIR__) . '/vendor/autoload.php';

\App\Bootstrap::boot();

$app->run();
