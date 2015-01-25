<?php
/**
 * phalcon_phpunit.
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Api\Controller;

use Model\ResponseBody;
use Phalcon\Mvc\Controller;

/**
 * 控制器基类
 *
 * @package Api\Controller
 */
class ControllerBase extends Controller
{

    /**
     * @param int $status
     * @return ResponseBody
     */
    public function setStatus($status)
    {
        return $this->responseBody->setStatus($status);
    }

    /**
     * @param string $info
     * @return ResponseBody
     */
    public function setInfo($info)
    {
        return $this->responseBody->setInfo($info);
    }

    /**
     * @param mixed $data
     * @return ResponseBody
     */
    public function setData($data)
    {
        return $this->responseBody->setData($data);
    }

}
