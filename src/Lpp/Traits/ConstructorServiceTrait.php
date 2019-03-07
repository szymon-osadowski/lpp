<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 23:37
 */
namespace Lpp\Traits;
use Lpp\Config\Config;
use Lpp\Service\FileManagerService;

trait ConstructorServiceTrait
{
    /**
     * @var array
     */
    private $mappedSource = [];


    /**
     * ConstructorServiceTrait constructor.
     * @param Config $config
     * @throws \ReflectionException
     */
    public function __construct(Config $config)
    {
        $file = new FileManagerService();
        $file->setDir($config->getParameters('db_source_dir'));
        $mapper = new \Lpp\Db\EntityMapper($file->getDataArray(), 1, 'Collection');
        $this->mappedSource[] = $mapper->execute();
    }
}