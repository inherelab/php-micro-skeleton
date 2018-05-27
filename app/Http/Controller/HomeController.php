<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-10-18
 * Time: 18:58
 */

namespace App\Http\Controller;

use Inhere\Library\Utils\LiteLogger;
use Mco\Helper\Respond;
use Mco\Http\HttpController;

/**
 * class HomeController
 * @Controller()
 */
class HomeController extends HttpController
{
    /**
     * @Route(route="/", method="GET")
     * Route(route="/*", method="GET")
     * @return string
     */
    public function index()
    {
        echo 'OOO';
        //\var_dump(__METHOD__);
        return 'hello, world';
    }

    /**
     * @Route()
     * @return string
     * @throws \Throwable
     */
    public function log()
    {
        $content = 'hello, welcome!! this is ' . __METHOD__;

        d(\Mco::get('logger'));

        \Mco::get('logger')->info('a message test');
        \Mco::get('logger')->notice('a notice test');
        \Mco::get('logger')->flush();

        de(\Mco::get('logger'));

        return $this->renderContent($content);
    }

    /**
     * @Route()
     * @param $ctx
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function routes($ctx)
    {
        /** @var \Inhere\Route\ORouter $router */
        $router = \Mco::$di->get('router');

        // Setting a header
        $ctx->res->setHeader('Content-Type', 'application/json');

        return Respond::json([
            'static' => $router->getStaticRoutes(),
            'regular' => $router->getRegularRoutes(),
            'vague' => $router->getVagueRoutes(),
        ]);
    }

    /**
     * @Route()
     * @throws \Inhere\Exceptions\FileSystemException
     */
    public function test()
    {

        $lgr = LiteLogger::make([
            'name' => 'test',
            'splitType' => 'hour',
            'basePath' => BASE_PATH . '/user/tmp',
        ]);

        $lgr->trace('a traced message');
        $lgr->info('a info message');
        var_dump($lgr);

        $lgr->flush();

        echo 'hello';
    }

    /**
     * @Route()
     */
    public function config()
    {
        echo 'ddd';
    }

    /**
     * @Route()
     */
    public function json()
    {
        \Mco::trace('test info');

        Respond::rawJson([
            'code' => 0,
            'msg' => 'successful!',
            'data' => [
                'name' => 'value',
            ]
        ]);
    }
}
