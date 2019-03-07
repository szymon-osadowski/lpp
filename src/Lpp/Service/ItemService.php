<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 22:18
 */

namespace Lpp\Service;
use Lpp\Traits\ConstructorServiceTrait;

/**
 * Class ItemService
 * @package Lpp\Service
 */
class ItemService implements ItemServiceInterface
{
    use ConstructorServiceTrait;

    /**
     * @param int $collectionId
     * @return array|Lpp\Entity\Brand[]
     */
    public function getResultForCollectionId($collectionId)
    {
        foreach($this->mappedSource as $collection)
        {
            if($collection->getId() == $collectionId)
            {
                return $this->prepareBrandList($collection->getBrands());
            }
        }
        return [];

    }

    /**
     * @param array $brands
     * @return array
     */
    private function prepareBrandList(array $brands)
    {
        $return = [];
        foreach($brands as $brand)
        {
            $return[$brand->getId()] = $brand;
        }

        return $return;
    }

    /*
     * It's not clear for me if you expected list of brands object or list of brands names, here is alternative version
     *
     *
     * @param array $brands
     * @return array

     *private function prepareBrandList(array $brands)
     *{
     *    $return = [];
     *    foreach($brands as $brand)
     *    {
     *        $return[$brand->getId()] = $brand->getName();
     *    }

     *    return $return;
     *}
     *
     * or just string
     * @param array $brands
     * @return string
     *
     *private function prepareBrandList(array $brands)
     *{
     *    $return = [];
     *    foreach($brands as $brand)
     *    {
     *        $return[$brand->getId()] = $brand->getName();
     *    }
     *
     *    return implode(", ", $return);
     *}
     */
}