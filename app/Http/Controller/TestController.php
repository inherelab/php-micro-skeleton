<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-10-18
 * Time: 18:58
 */

namespace App\Http\Controller;

use Inhere\Library\Utils\LiteLogger;
use Mco\Http\BaseController;

/**
 * class HomeController
 */
class TestController extends BaseController
{
    /**
     * @SWG\Post(
     *      tags={"user.follow"},
     *      path="/user/follow",
     *      summary="用户关注 - 关注一个人",
     *      @SWG\Parameter(ref="#/parameters/api_version_in_query"),
     *      @SWG\Parameter(
     *          name="BodyData",
     *          in="body",
     *          @SWG\Schema(
     *              type="object",
     *              required={"userId", "targetId"},
     *              @SWG\Property(type="integer", property="userId", description="current user ID"),
     *              @SWG\Property(type="integer", property="targetId", description="target user ID")
     *          )
     *      ),
     *      @SWG\Response(response="200", ref="#/responses/default")
     * )
     */
    public function indexAction()
    {
        $content = 'hello, welcome!! this is ' . __METHOD__;

        return $this->renderContent($content);
    }

    public function ctxAction($ctx)
    {
        $content = 'hello, welcome!! this is ' . __METHOD__;

        d($ctx);

        return $this->renderContent($content);
    }

    public function errAction()
    {
        $content = 'hello, welcome!! this is ' . __METHOD__;

        trigger_error('test trigger user error', E_USER_ERROR);
//        trigger_error('test trigger user error', E_USER_WARNING);

        return $this->renderContent($content);
    }

    public function err1Action()
    {
        throw new \TypeError('test Type Error');
    }

    public function err2Action()
    {
        call_not_exists_func();
    }

    public function expAction()
    {
        throw new \RuntimeException('test Exception');
    }

    public function logAction()
    {
        //de(\Mco::get('config')->all());

//        d(\Mco::get('logger'));

        \Mco::get('logger')->info('a message test');
        \Mco::get('logger')->notice('a notice test');
        \Mco::get('logger')->flush();

        de(\Mco::get('logger'));
    }

    public function log1Action()
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
        de(\Mco::get('config')->all());
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
