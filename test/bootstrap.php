<?php
/**
 * phalcon_phpunit.
 *
 * 入口文件
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */
use Config\Bootstrap;
use Phalcon\DI\FactoryDefault;

require __DIR__ . '/../config/Bootstrap.php';
$bootstrap = new Bootstrap();
$application = $bootstrap->getApplication($di = new FactoryDefault(), 'index');

