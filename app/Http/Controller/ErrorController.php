<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-10-18
 * Time: 18:58
 */

namespace App\Http\Controller;

use Mco\Http\HttpController;

/**
 * class ErrorController
 * @Controller()
 */
class ErrorController extends HttpController
{
    /**
     * @Route(route="/error")
     * @return string
     * @throws \Throwable
     */
    public function index(): string
    {
        return $this->error();
    }

    /**
     * @Route(route="/500")
     * @return string
     * @throws \Throwable
     */
    public function error(): string
    {
        return $this->renderPartial('@resources/views/500.tpl');
    }

    /**
     * @Route(route="/404")
     * @return string
     * @throws \Throwable
     */
    public function notFound(): string
    {
        return $this->renderPartial('@resources/views/404.tpl');
    }

    /**
     * @Route(route="/405")
     * @return string
     * @throws \Throwable
     */
    public function notAllowed(): string
    {
        return $this->renderPartial('@resources/views/405.tpl');
    }
}
