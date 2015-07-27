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

use Phalcon\Config;

return new Config([
    'debug' => 1,

    'view' => [
        'dir' => '',
    ],

    'db' => [
        'host' => '127.0.0.1',
        'dbname' => 'phalcon_test',
        'username' => 'root',
        'password' => 'root',
    ]
]);
