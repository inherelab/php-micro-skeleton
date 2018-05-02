<?php
/**
 * the common config
 */

use Inhere\Library\Utils\LiteLogger;

return [
    'name'    => 'My App',
    'debug'    => false,
    'env'      => 'pdt',
    'charset'  => 'UTF-8',
    'rootPath' => BASE_PATH,

    'enableCsrfToken' => true,

    'serviceProviders' => [
        \App\Provider\CommonServiceProvider::class,
    ],

    // common services
    'services' => [

        /**
         * basic service
         */

        'logger' => [
            'class'       => LiteLogger::class,
            'name'         => 'app',
            'logFile'      => '@tmp/logs/application.log',
            'basePath'     => '@tmp/logs',
            'level'        => LiteLogger::DEBUG,
            'splitType'    => 1,
            'bufferSize'   => 1000, // 1000,
            'pathResolver' => 'alias_path',
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
                    'path' => alias_path('@user/tmp/caches'),
                    'securityKey' => 's6df89rtdlw',
                ]
            ]
        ],
    ]
];
