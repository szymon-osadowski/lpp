<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 20:53
 */

namespace Lpp\Service;


/**
 * Class FileManagerService
 * @package Lpp\Service
 */
class FileManagerService
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $fileDir;

    /**
     * @var string
     */
    private $fileRealPath;

    public function __construct($dir = '')
    {
        $this->setDir($dir);
    }

    /**
     * @param string $fileDir
     */
    public function setDir(string $fileDir)
    {
        $this->fileDir = $fileDir;
        $this->fileRealPath = realpath('./') . '/' . $fileDir;
    }

    /**
     * @return array
     */
    public function getDataArray():array
    {
        $this->content = file_get_contents($this->fileRealPath);
        return json_decode($this->content , true);
    }

}