<?php
/**
 * phalcon_phpunit.
 *
 * @author Haow1 <haow1@jumei.com>
 * @version $Id$
 */

namespace Index\Controller;

use Model\ResponseBody;
use Phalcon\Mvc\Controller;

/**
 *
 *
 * @property ResponseBody responseBody
 * @package Index\Controller
 */
class IndexController extends Controller
{
    /**
     *
     *
     * @return ResponseBody
     */
    public function indexAction()
    {
        $name = $this->request->getPost('name', 'string');
        $this->responseBody->setData($name);
        return $this->responseBody;
    }
}
