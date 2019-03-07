<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 26.10.2018
 * Time: 00:44
 */

namespace src\Lpp\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Extension_Debug;

use Lpp\Config\Config;

/**
 * Class BaseController
 * @package src\Lpp\Controller
 */
abstract class BaseController
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * BaseController constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $loader = new Twig_Loader_Filesystem($config->getParameters('twig_view_dir'));
        $this->twig = new Twig_Environment($loader, [
            'cache' => $config->getParameters('twig_cache_dir'),
            'debug'  => true
        ]);
        $this->twig->addExtension(new Twig_Extension_Debug());
    }

    /**
     * @param string $template
     * @param array $parameters
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function render(string $template, array $parameters)
    {
        echo $this->twig->render($template, $parameters);
    }

}