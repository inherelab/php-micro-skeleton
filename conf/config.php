<?php
/**
 * the common config
 */
return [
    'name'    => env('APP_NAME', 'My App'),
    'debug'    => env('APP_DEBUG', false),
    'env'      => env('APP_ENV', 'pdt'),
    'charset'  => 'UTF-8',
    'rootPath' => BASE_PATH,

    'enableCsrfToken' => true,

    'errorRender' => [
        'displayErrorDetails' => true,
        'rootPath' => BASE_PATH,
        'hideRootPath' => true,
    ],

    'serviceProviders' => [
        \App\Provider\CommonServiceProvider::class,
    ],

    // common services
    'services' => [

        /**
         * basic service
         */

        'logger' => [
            'class'       => \Mco\Log\FileLogger::class,
            'name'         => 'app',
            'logFile'      => '@tmp/logs/application.log',
            'basePath'     => '@tmp/logs',
            'level'        => \Mco\Log\FileLogger::DEBUG,
            'splitType'    => 1,
            'bufferSize'   => 1000, // 1000,
            'pathResolver' => 'alias',
        ],

        'language'   => [
            'class' => \Toolkit\Collection\Language::class,
            'lang'      => 'zh-CN',
            'langs'     => ['en', 'zh-CN'],
            'basePath'  => dirname(__DIR__).'/res/languages',
            'langFiles' => [
                'response.php',
            ],
        ],

        'pinyin' => [
            'class' => \Overtrue\Pinyin\Pinyin::class,
            //[ \Overtrue\Pinyin\MemoryFileDictLoader::class ],
        ],
        'db'     => [
            'class' => \Inhere\Library\Components\DatabaseClient::class,
            [
                [
                    'debug'       => 1,
                    'user'        => 'root',
                    'password'    => 'root',
                    'database'    => 'art_fonts',
                    'tablePrefix' => 'af_',
                ],
            ],
        ],
        'cache' => [
            'class' => \phpFastCache\Helper\Psr16Adapter::class,
            [
                'files',
                [
                    'path' => alias('@tmp/caches'),
                    'securityKey' => 's6df89rtdlw',
                ]
            ]
        ],
    ]
];
