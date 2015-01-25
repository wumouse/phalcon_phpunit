<?php
/**
 * phalcon_phpunit.
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Test;

use Api\Controller\IndexController;
use Phalcon\Mvc\Dispatcher;

/**
 * 默认控制器测试
 *
 * @package Test
 */
class IndexControllerTest extends AbstractUniTest
{
    public function testIndexAction()
    {
        $controller = new IndexController();
        /** @var Dispatcher $dispatcher */
        $dispatcher = $this->di->get('dispatcher');
        $dispatcher->setParam(0, 1);
        $result = $controller->indexAction();
        $this->assertArrayHasKey('id', $result->getData());
        $this->assertEquals(1, $result->getData()['id']);
    }

}
