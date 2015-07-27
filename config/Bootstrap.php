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

use Phalcon\Config;
use Phalcon\DI;
use Phalcon\DI\FactoryDefault;
use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\View;

/**
 *
 *
 * @package Config
 */
class Bootstrap
{
    /**
     *
     *
     * @var string
     */
    protected $appName;

    /**
     *
     *
     * @var string
     */
    protected $projectDir;

    /**
     *
     *
     * @var string
     */
    protected $appDir;

    /**
     *
     *
     * @var Config
     */
    protected $config;

    /**
     *
     *
     * @var string
     */
    protected $controllerDefaultNamespace;

    /**
     * @param string $appName
     * @return Bootstrap
     */
    private function setAppName($appName)
    {
        $this->appName = $appName;
        $this->projectDir = __DIR__ . '/..';
        $this->appDir = $this->projectDir . '/apps/' . $appName;
        if (!stream_resolve_include_path($this->appDir)) {
            throw new \InvalidArgumentException('Please make sure the app dir name same as app name');
        }
        $this->controllerDefaultNamespace = ucfirst($appName) . '\\Controller';
        return $this;
    }

    /**
     *
     *
     * @param string $appName
     * @param FactoryDefault $di
     * @return Application
     */
    public function getApplication(FactoryDefault $di, $appName)
    {
        $this->setAppName($appName);
        $this->initDi($di);
        $di->get('dispatcher')->setDefaultNamespace($this->controllerDefaultNamespace);
        $application = new Application($di);
        return $application;
    }

    /**
     *
     *
     * @param DiInterface $di
     */
    private function initDi($di)
    {
        $methodsWithOrder = [
            'registerConfig',
            'registerLoader',
            'registerVolt',
            'registerView',
            'registerResponseBody',
        ];

        foreach ($methodsWithOrder as $method) {
            $callback = [$this, $method];
            if (is_callable($callback)) {
                call_user_func($callback, $di);
            }
        }
    }

    /**
     *
     *
     * @param DI $di
     */
    public function registerConfig($di)
    {
        /** @var Config $config */
        $config = require $this->projectDir . '/config/app.php';
        $appConfigPath = $this->appDir . '/config/app.php';
        if (stream_resolve_include_path($appConfigPath)) {
            $config->merge(require $appConfigPath);
        }
        $this->config = $config;
        $di->set('config', $config, true);
    }

    /**
     *
     *
     * @param DI $di
     */
    public function registerLoader($di)
    {

        $loader = new Loader();
        $config = $this->config;

        $namespaces = [
            $this->controllerDefaultNamespace => $this->appDir . '/Controller',
            'Model' => $this->projectDir . '/model',
        ];
        if ($config->offsetExists('namespaces')) {
            $namespaces += $config->offsetExists('namespaces');
        }
        $loader->registerNamespaces($namespaces);

        if ($config->offsetExists('classes')) {
            $loader->registerClasses($config->get('classes'));
        }

        $loader->register();
        $di->set('loader', $loader, true);
    }

    /**
     *
     *
     * @param DI $di
     */
    public function registerView($di)
    {
        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir($this->appDir . '/' . $this->config->view->dir);
            $view->registerEngines([
                '.volt' => 'volt',
            ]);
            return $view;
        }, true);
    }

    /**
     *
     *
     * @param DI $di
     */
    public function registerVolt($di)
    {
        $di->set('volt', function () use ($di) {
            $volt = new View\Engine\Volt($di->get('view'));
            $volt->setOptions([
                'compiledPath' => '/tmp/compiled',
            ]);
            return $volt;
        }, true);
    }

    /**
     *
     *
     * @param FactoryDefault $di
     */
    public function registerResponseBody($di)
    {
        $di->set('responseBody', 'Model\ResponseBody', true);
    }
}
