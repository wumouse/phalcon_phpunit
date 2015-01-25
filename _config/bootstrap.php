<?php
/**
 * phalcon_phpunit.
 *
 * 服务设置文件
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Config;

use Model\ResponseBody;
use Phalcon\Config\Adapter\Php;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\DI\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Mvc\View;

$di = new FactoryDefault();

$config = new Php(__DIR__ . '/app.php');
$config->merge(new Php(APP_DIR . '/config/app.php'));
$di->set('config', $config, true);

$loader = new Loader();
$loader->registerNamespaces($config->autoloadNamespaces->toArray());
$loader->register();

$di->get('dispatcher')->setDefaultNamespace($config->controllerNamespace);

$di->set('view', function () use ($config) {
    $view = new View();
    $view->setViewsDir($config->view->dir);
    return $view;
}, true);

$di->set('db', function () use ($config) {
    $db = new Mysql($config->db->toArray());
    return $db;
}, true);

$di->set('responseBody', 'Model\ResponseBody', true);

return $di;
