<?php
/**
 * the common config
 */

// use Overtrue\Pinyin\MemoryFileDictLoader;
use Inhere\Library\Utils\LiteLogger;
use Overtrue\Pinyin\Pinyin;

return [
    'name'    => 'My App',
    'debug'    => false,
    'env'      => 'pdt',
    'charset'  => 'UTF-8',
    'timeZone' => 'Asia/Shanghai',
    'rootPath' => BASE_PATH,

    'enableCsrfToken' => true,

    'language'   => [
        'lang'      => 'zh-CN',
        'langs'     => ['en', 'zh-CN'],
        'basePath'  => dirname(__DIR__).'/res/languages',
        'langFiles' => [
            'response.php',
        ],
    ],

    'services' => [
        /**
         * basic service
         */

        'logger' => [
            'target'       => LiteLogger::class,
            'name'         => 'app',
            'logFile'      => '@tmp/logs/application.log',
            'basePath'     => '@tmp/logs',
            'level'        => LiteLogger::DEBUG,
            'splitType'    => 1,
            'bufferSize'   => 1000, // 1000,
            'pathResolver' => 'alias_path',
        ],
        'pinyin' => [
            'target' => Pinyin::class,
            // '_args' => [ MemoryFileDictLoader::class ],
        ],
        'db'     => [
            'target' => \Inhere\Library\Components\DatabaseClient::class,
            '_args'  => [
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
            'target' => \phpFastCache\Helper\Psr16Adapter::class,
            '_args' => [
                'files',
                [
                    'path' => alias_path('@user/tmp/caches'),
                    'securityKey' => 's6df89rtdlw',
                ]
            ]
        ],
    ],
];
