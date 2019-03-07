<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 26.10.2018
 * Time: 00:55
 */

namespace src\Lpp\Controller;

use Lpp\Service\ItemService;

/**
 * Class MainController
 * @package src\Lpp\Controller
 */
class MainController extends BaseController
{

    /**
     * @throws \ReflectionException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $itemService = new ItemService($this->config);

        $brnds = $itemService->getResultForCollectionId(1315475);

        $this->render('index.html.twig', ['brands'=> $brnds]);
    }
}