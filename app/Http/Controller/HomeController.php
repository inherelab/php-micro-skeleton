<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-10-18
 * Time: 18:58
 */

namespace App\Http\Controller;

use Inhere\Library\Utils\LiteLogger;
use Mco\Helpers\Respond;
use Mco\Http\BaseController;

/**
 * class HomeController
 */
class HomeController extends BaseController
{
    public function indexAction()
    {
        echo 'OOO';
        return 'hello, world';
    }

    public function logAction()
    {
        $content = 'hello, welcome!! this is ' . __METHOD__;
//de(\Mco::get('config')->all());

        d(\Mco::get('logger'));

        \Mco::get('logger')->info('a message test');
        \Mco::get('logger')->notice('a notice test');
        \Mco::get('logger')->flush();

        de(\Mco::get('logger'));

        return $this->renderContent($content);
    }

    public function routesAction($ctx)
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

    public function testAction()
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

    public function configAction()
    {
        echo 'ddd';
    }

    public function json()
    {
        \Mco::trace('test info');

        Mco::$app->output->json([
            'code' => 0,
            'msg' => 'successful!',
            'data' => [
                'name' => 'value',
            ]
        ]);
    }
}
