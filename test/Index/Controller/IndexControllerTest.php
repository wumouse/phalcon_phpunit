<?php
/**
 * phalcon_phpunit.
 *
 * @author Haow1 <haow1@jumei.com>
 * @version $Id$
 */

namespace Test\Index\Controller;

use Index\Controller\IndexController;
use Model\ResponseBody;
use Phalcon\DI;
use Phalcon\Http\Request;

/**
 *
 *
 * @package Test\Index\Controller
 */
class IndexControllerTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     *
     * @var IndexController
     */
    protected $controller;

    /**
     *
     *
     * @var DI
     */
    protected $di;

    protected function setUp()
    {
        parent::setUp();
        $this->controller = new IndexController();
        $this->di = DI::getDefault();
    }

    public function testIndexAction()
    {
        $name = 'gaga';
        $_POST['name'] = $name;

        /** @var ResponseBody $responseBody */
        $responseBody = $this->controller->indexAction();
        $this->assertEquals($responseBody->getStatus(), 1);
        $this->assertEquals($responseBody->getData(), $name);
    }
}
