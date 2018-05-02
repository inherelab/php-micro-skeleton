<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午10:58
 *
 * @var Mco\Console\App $app
 */

$app->registerCommands('App\\Console\\Command', alias('@app/Console/Command'));
$app->registerGroups('App\\Console\\Controller', alias('@app/Console/Controller'));

$app->addCommand(\Inhere\Console\BuiltIn\DevServerCommand::class);
$app->addController(\Inhere\Console\BuiltIn\PharController::class);
