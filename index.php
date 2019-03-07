<?php
require_once('src/SplClassLoader.php');

require_once 'vendor/autoload.php';
use Lpp\Service\FileManagerService;
use Lpp\Config\Config;

$loader = new SplClassLoader( );
$loader->register();

/*
 * Set parameters file location
 */
$parametersFileDir = 'src/Lpp/Config/parameters.json';

$configFile = new FileManagerService($parametersFileDir);
$config = new Config($configFile);

$routing = new \src\Lpp\Controller\RoutingController($config);
