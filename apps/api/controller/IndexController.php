<?php
/**
 * phalcon_phpunit.
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Api\Controller;

/**
 * 默认控制器
 *
 * @package Api\Controller
 */
class IndexController extends ControllerBase
{

    /**
     * 默认action
     *
     * @return \Model\ResponseBody
     */
    public function indexAction()
    {
        $id = $this->dispatcher->getParam(0);
        $sql = "SELECT * FROM robots WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        return $this->setData($result->fetch());
    }

}
