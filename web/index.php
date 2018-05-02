<?php

define('RUN_MODE', 'web');
defined('IN_SWOOLE') || define('IN_SWOOLE', false);

require dirname(__DIR__) . '/vendor/autoload.php';
include dirname(__DIR__) . '/conf/defined.php';

/** @var \Mco\Http\App $app */
$app = \App\Bootstrap::boot();

// in the unit testing.
if (IN_CODE_TESTING) {
    return $app;
}

$app->use(function ($req, $h) {
    echo "before\n";

    $res = $h->handle($req);

    echo "after\n";

    return $res;
});

$app->run();
