<?php
/**
 * config for web
 */

use Toolkit\ArrUtil\Arr;
use Inhere\Route\ORouter;

return Arr::merge(require __DIR__ . '/config.php', [
    'application' => [
        'host' => 'localhost',
        'baseTitle' => 'ArtFonts',
        'description' => 'application description',
        'keywords' => 'application keywords',
    ],

    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => true,

    'filterFavicon' => true,

    'response' => [
        'chunkSize' => 4096,
        'httpVersion' => '1.1',
        'addContentLengthHeader' => false,
    ],

    'serviceProviders' => [
        \App\Provider\WebServiceProvider::class,
    ],

    'services' => [
        /**
         * http service
         */

        'router' => [
            'class' => ORouter::class,
            'config' => [
                'ignoreLastSep' => true,
                'tmpCacheNumber' => 200,
            ],
        ],
        'routeDispatcher' => [
            'class' => \Mco\Http\RouteDispatcher::class,
            'outputBuffering' => false,
            'config' => [
                'dynamicAction' => true,
            ],
        ],
        'renderer' => [
            'class' => \Toolkit\Web\ViewRenderer::class,
            'suffix' => 'tpl',
            'layout' => '_layouts/default.tpl',
            'viewsPath' => dirname(__DIR__) . '/resources/views',
            'attributes' => [
                '_navKey' => '',
            ],
        ],
    ]
]);
