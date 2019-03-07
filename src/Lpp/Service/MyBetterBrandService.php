<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 23:30
 */

namespace Lpp\Service;

use Lpp\Config\Config;

/**
 * Class MyBetterBrandService
 * @package Lpp\Service
 */
class MyBetterBrandService implements BrandBetterServiceInterface
{
    /**
     * @var array
     */
    private $mappedSource = [];

    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    /**
     * MyBetterBrandService constructor.
     * @param ItemServiceInterface $itemService
     * @param Config $config
     * @throws \ReflectionException
     */
    public function __construct(ItemServiceInterface $itemService, Config $config)
    {
        $file = new FileManagerService();
        $file->setDir($config->getParameters('db_source_dir'));
        $mapper = new \Lpp\Db\EntityMapper($file->getDataArray(), 1, 'Collection');
        $this->mappedSource[] = $mapper->execute();
        $this->itemService = $itemService;
    }

    /**
     * @param string $collectionName
     * @return array
     */
    public function getItemsForCollection($collectionName):array
    {
        $collectionIds = $this->getCollectionIdFromName($collectionName);
        $brands = $this->prepareBrandsArray($collectionIds);

        return $this->getItemsForBrands($brands);
    }

    /**
     * @param array $collectionIds
     * @return array
     */
    private function prepareBrandsArray(array $collectionIds):array
    {
        $brands = [];
        foreach($collectionIds as $collectionId)
        {
            $brands = array_merge($brands, $this->itemService->getResultForCollectionId($collectionId));
        }
        return $brands;
    }

    /**
     * @param array $brands
     * @return array
     */
    private function getItemsForBrands(array $brands):array
    {
        $items = [];
        foreach ($brands as $brand)
        {
            $items = array_merge($items, $brand->getItems());
        }
        return $items;
    }

    /**
     * @param string $collectionName
     * @return array
     */
    private function getCollectionIdFromName(string $collectionName):array
    {
        $return = [];
        foreach($this->mappedSource as $collection)
        {
            if($collection->getCollection() == $collectionName)
            {
                $return[] = $collection->getId();
            }
        }

        return $return;
    }
}