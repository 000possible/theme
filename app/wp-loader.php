<?php

/**
 *
 * This file is part of the kernelstudio package.
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @author libertyspy < service@kernelstudio.com >
 * @link http://www.kernelstudio.com
 * @version 0.1
 * @since 0.1
 */
if (! defined('ABSPATH')) {
    $absPath = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
    if (file_exists($loader = $absPath . '/wp-load.php')) {
        require_once $loader;
    }
}