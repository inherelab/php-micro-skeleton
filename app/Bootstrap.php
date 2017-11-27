<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 上午12:18
 */

namespace App;

use \Inhere\Library\DI\Container;

/**
 * Class Bootstrap
 * @package App
 */
class Bootstrap
{
    public static function boot(Container $di)
    {
        \Mco::$di = $di;
    }
}