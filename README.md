安装
------------

* 使用`composer` 创建主题项目 `php composer create-project typenter/theme <your-theme-name>`

目录说明
--------------------------
* app  `启动文件目录`
* app/Resources/views      `模版文件目录`
* assets    `静态资源目录`
* cache     `缓存目录`
* views     `模版目录`
* tests		`测试脚本`

app/kernel.php 内核启动脚本
--------------------------
```php
<?php
defined('ABSPATH') or die('-2');

require __DIR__ . '/autoload.php';

use Typenter\Component\Kernel\Kernel;
use Typenter\Component\Kernel\KernelEvents;
use Typenter\Component\Kernel\Event\GetAssetsEvent;

class ThemeAppKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new Typenter\Bundle\TemplatingBundle\TemplatingBundle(),
            new Typenter\Bundle\FrameworkBundle\FrameworkBundle(),
            new Typenter\Bundle\ThemeBundle\ThemeBundle()
        );
    }
    
    /**
     * @see \Typenter\Component\Kernel\KernelEvents
     * @return  array
     */
    public function registerEventListeners()
    {
        return array(
             array(
                'name' => KernelEvents::ENQUEUE_ASSETS,
                'priority' => 200,
                'listener' => function (GetAssetsEvent $event) {
                    // $event->addStyle($handle, $style);
                    // $event->addScript($handle, $script, array(), $event::VERSION, true);
                }
            ),
        );
    }
    
    /**
     * @return  array
     */  
    public function registerEventSubscribers()
    {
        return array(
            // new Typenter\Bundle\FrameworkBundle\EventListener\AssetsEventSubscriber(),  
            // ...
        );
    }
}   
    
// dev 启用开发环境,页面缓存会自动刷新，生产环境 prod
$kernel = new ThemeAppKernel('dev');	
$kernel->boot();
// 如果需要在其他PHP代码中使用整个运行环境,需要设置全局变量  
typenter_setup_environment($kernel);  
```    

模版
--------------------------
如果指定了命名空间为`ThemeBundle` 则`typenter_render('@ThemeBundle/index.html.twig')` 的查找顺序为
* `<主题根目录>/views/ThemeBundle/index.html.twig`
* `<主题根目录>/path/to/ThemeBundle/Resources/views/index.html.twig`

`typenter_render('index.html.twig')` 查找目录为
* `<主题根目录>/app/Resources/views/index.html.twig` 

如果未找到则抛出异常.