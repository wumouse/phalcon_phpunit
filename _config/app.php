<?php
/**
 * phalcon_phpunit.
 *
 * 公共配置文件
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Config;

/** 控制器顶层空间 */
const CONTROLLER_NAMESPACE = 'Api\Controller';

return [
    'debug' => 1,
    'autoloadNamespaces' => [
        CONTROLLER_NAMESPACE => APP_DIR . '/controller',
        'Model' => PROJECT_DIR . '/model',
    ],

    'controllerNamespace' => CONTROLLER_NAMESPACE,

    'view' => [
        'dir' => '',
    ],

    'db' => [
        'host' => '127.0.0.1',
        'dbname' => 'phalcon_test',
        'username' => 'root',
        'password' => 'root',
    ]
];
