<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-12-04
 * Time: 14:58
 */

namespace App\Http\Controller;

/**
 * Class RestController
 * @package App\Http\Controllers
 * @Controller()
 */
class RestController
{
    /**
     * @Route("@")
     */
    public function index()
    {
        echo __METHOD__ . PHP_EOL;
    }

    /**
     * @Route("/{id}")
     */
    public function view()
    {
        echo __METHOD__ . PHP_EOL;
    }

    /**
     * @Route("@", method="POST")
     */
    public function create()
    {
        echo __METHOD__ . PHP_EOL;
    }

    public function update()
    {
        echo __METHOD__ . PHP_EOL;
    }

    public function patch()
    {
        echo __METHOD__ . PHP_EOL;
    }

    public function delete()
    {
        echo __METHOD__ . PHP_EOL;
    }
}
