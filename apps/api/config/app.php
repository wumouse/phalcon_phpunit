<?php
/**
 * phalcon_phpunit.
 *
 * @author wumouse <wumouse@qq.com>
 * @version $Id$
 */

namespace Api\Config;

use Phalcon\Config;

return new Config([
    'view' => [
        'dir' => APP_DIR . '/view/',
    ]
]);
