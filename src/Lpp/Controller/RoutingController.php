<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 26.10.2018
 * Time: 00:56
 */

namespace src\Lpp\Controller;


use Lpp\Config\Config;

/**
 * Class RoutingController
 * @package src\Lpp\Controller
 */
class RoutingController
{
    /**
     * @var mixed
     */
    private $slug;

    /**
     * @var Config
     */
    private $config;

    /**
     * RoutingController constructor.
     * @param Config $config
     * @throws \ReflectionException
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $args = explode('/',$_SERVER['REQUEST_URI']);
        if($args[0] == 'index.php')array_shift($args);
        $this->slug = end($args);
        $this->callController();
    }

    /**
     * @throws \ReflectionException
     */
    public function callController()
    {
        $controllerInfo = $this->config->getRouteInfo($this->slug);
        if(!$controllerInfo)
        {
            http_response_code(404);
            die();
        }
        $reflectionClass = new \ReflectionClass('src\Lpp\Controller\\'.$controllerInfo['controller']);
        $controller = $reflectionClass->newInstanceArgs([$this->config]);
        call_user_func_array([$controller, $controllerInfo['method']],[]);
    }

}