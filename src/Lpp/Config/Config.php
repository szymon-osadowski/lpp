<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 22:19
 */
namespace Lpp\Config;

use Lpp\Service\FileManagerService;

class Config
{
    /**
     * @var FileManagerService
     */
    private $fileManagerService;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var array
     */
    private $routes;

    /**
     * Config constructor.
     * @param FileManagerService $fileManagerService
     */
    public function __construct(FileManagerService $fileManagerService)
    {
        $this->fileManagerService = $fileManagerService;
        $this->parameters = $fileManagerService->getDataArray();
        $this->fileManagerService->setDir($this->getParameters('route_dir'));
        $this->routes = $this->fileManagerService->getDataArray();
    }

    /**
     * @param string $name
     * @return string
     */
    public function getParameters(string $name): string
    {
        return $this->parameters[$name];
    }

    /**
     * @param string $name
     * @return string
     */
    public function hasParameters(string $name):string
    {
        return key_exists($name, $this->parameters);
    }

    /**
     * @param string $routeName
     * @return mixed
     */
    public function getRouteInfo(string $routeName)
    {
        if(key_exists($routeName, $this->routes)){
            return $this->routes[$routeName];
        }else{
            return false;
        }

    }
}