<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午10:58
 *
 * @var Mco\Console\App $app
 */

$app->registerCommands('App\\Console\\Commands', get_path('app/Console/Commands'));
$app->registerGroups('App\\Console\\Controllers', get_path('app/Console/Controllers'));

$app->addController(\Inhere\Console\BuiltIn\PharController::class);
