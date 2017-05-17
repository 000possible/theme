<?php
defined('ABSPATH') or die('-2');

/**
 * This file is part of the kernelstudio package.
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @author libertyspy < service@kernelstudio.com >
 *        
 * @see http://www.kernelstudio.com
 */

require __DIR__ . '/autoload.php';
// require __DIR__ . '/functions.php';

use Typenter\Component\Kernel\Kernel;

class ThemeAppKernel extends Kernel
{

    /**
     *
     * {@inheritdoc}
     *
     * @see \Bridge\Component\Kernel\Kernel::registerBundles()
     */
    public function registerBundles()
    {
        return array(
            new Typenter\Bundle\TemplatingBundle\TemplatingBundle(),
            new Typenter\Bundle\FrameworkBundle\FrameworkBundle(),
            new Typenter\Bundle\ThemeBundle\ThemeBundle()
        );
    }
}

$kernel = new ThemeAppKernel('dev');
$kernel->boot();

typenter_setup_environment($kernel);

//dump($kernel);
