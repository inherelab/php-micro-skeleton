<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/11/27
 * Time: 下午11:53
 */

namespace App\Provider;

use App\Listener\MysqlListener;
use Inhere\Event\EventManager;
use Toolkit\Collection\Configuration;
use Inhere\LiteCache\MemCache;
use Inhere\LiteCache\LiteRedis;
use Toolkit\DI\Container;
use Toolkit\DI\ServiceProviderInterface;
use Inhere\LiteCache\RedisCache;
use Inhere\LiteDb\LitePdo;

/**
 * Class CommonServiceProvider
 * @package App\Providers
 */
class CommonServiceProvider implements ServiceProviderInterface
{
    /**
     * 注册一项服务(可能含有多个服务)提供者到容器中
     * @param Container $di
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * @throws \Inhere\Exceptions\DependencyResolutionException
     */
    public function register(Container $di)
    {
        // database services.
        $this->registerDbServices($di);

        // cache services.
        $this->registerCacheServices($di);
    }

    /**
     * @param Container $di
     * @throws \Toolkit\DI\Exception\DependencyResolutionException
     */
    private function registerDbServices(Container $di)
    {
        // MySQL: Database connection
        $di->set('mainMysql.master', function (Container $di) {
            $em = $di->get('eventManager');
            $em->attach('db', new MysqlListener([
                'service' => 'mainMysql.master'
            ]));
            $config = $di->get('config')->get('mainMysql.master');

            return new LitePdo($config);
        });

        $di->set('mainMysql.slave', function (Container $di) {
            $em = $di->get('eventManager');
            $em->attach('db', new MysqlListener([
                'role' => 'slave',
                'service' => 'mainMysql.slave'
            ]));

            $config = $di->get('config')->get('mainMysql.slave');
            // $db->setEventManager($em);

            return new LitePdo($config);
        });

        // Mongo: Connecting to Mongo
        $di->set('mainMongo', function (Container $di) {
            $config = $di->get('config')->get('mainMongo');

            // 'mongodb:///tmp/mongodb-27017.sock,localhost:27017'
            $mongo = new \MongoClient('mongodb://' . $config['server'], $config['options']);

            return $mongo->selectDB($config['dbname']);
        });
    }

    /**
     * @param Container $di
     * @throws \Inhere\Exceptions\DependencyResolutionException
     */
    private function registerCacheServices(Container $di)
    {
        $di->set('memcache', function (Container $di) {
            $config = $di->get('config')->get('memcache');

            return new MemCache($config);
        });

        $di->set('cacheRedis', function (Container $di) {
            $config = $di->get('config')->get('cacheRedis');

            return new RedisCache($config);
        });

        $di->set('dataRedis', function (Container $di) {
            $config = $di->get('config')->get('dataRedis');

            return new LiteRedis($config);
        });
    }
}
