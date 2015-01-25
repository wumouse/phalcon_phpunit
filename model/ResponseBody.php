<?php
/**
 * phalcon_phpunit.
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Model;

/**
 * 响应主体
 *
 * @package Model
 */
class ResponseBody implements \JsonSerializable
{
    /**
     *  状态
     *
     * @var int
     */
    protected $status = 1;

    /**
     * 信息
     *
     * @var string
     */
    protected $info = '';

    /**
     * 数据
     *
     * @var mixed
     */
    protected $data = [];

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return ResponseBody
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     * @return ResponseBody
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return ResponseBody
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * 实现JSON序列化接口
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
