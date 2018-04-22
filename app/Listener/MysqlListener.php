<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017/12/3
 * Time: 下午11:28
 */

namespace App\Listener;

/**
 * Class MysqlListener
 * @package App\Listener
 */
class MysqlListener
{

    /**
     * @var array
     */
    private $options;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }
}
