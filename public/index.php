<?php
/**
 * phalcon_phpunit.
 *
 * 入口文件
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */
use Phalcon\Mvc\Application;
use Phalcon\Mvc\View;

/** 工程目录 */
const PROJECT_DIR = '..';
/** 项目目录 */
const APP_DIR = '../apps/api';

try {
    $di = require PROJECT_DIR . '/_config/bootstrap.php';
    $application = new Application($di);
    $application->handle();
} catch (\Exception $e) {
    echo $e;
} finally {
    /** @var View $view */
    $view = $di->get('view');
    if ($view->finish()) {
        $di->get('response')->setContentType('application/json', 'utf-8')->send();
        echo json_encode($di->get('dispatcher')->getReturnedValue());
    } else {
        $di->get('response')->send();
    }
}
