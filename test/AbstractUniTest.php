<?php
/**
 * phalcon_phpunit.
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Test;

use Phalcon\Db\Adapter\Pdo\Sqlite;
use Phalcon\DI;
use Phalcon\DiInterface;

/**
 *
 *
 * @package Test
 */
abstract class AbstractUniTest extends \PHPUnit_Framework_TestCase
{
    /**
     * 注入容器
     *
     * @var DiInterface
     */
    protected $di;

    /**
     * 返回注入容器
     *
     * @return DiInterface
     */
    public function getDi()
    {
        return $this->di;
    }

    /**
     * 设置DI
     *
     * @param DiInterface $di
     */
    protected function setUp(DiInterface $di = null)
    {
        if (!$di) {
            $di = DI::getDefault();
        }
        $di->set('db', function () {
            $db = new Sqlite([
                'dbname' => './unit_test.sqlite',
            ]);
            return $db;
        }, true);
        $this->di = $di;
    }
}
