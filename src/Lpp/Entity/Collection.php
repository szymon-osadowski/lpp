<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 22:10
 */

namespace Lpp\Entity;

use Lpp\Db\BaseEntity;

/**
 * Class Collection
 * @package Lpp\Entity
 */
class Collection extends BaseEntity
{
    /**
     * @var string
     */
    private $collection;

    /**
     * @var array
     */
    private $brands = [];

    /**
     * @return mixed
     */
    public function getCollection():string
    {
        return $this->collection;
    }

    /**
     * @param string $collection
     * @return Collection
     */
    public function setCollection(string $collection):Collection
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @param array $brands
     * @return Collection
     */
    public function setBrands(array $brands): Collection
    {
        $this->brands = $brands;

        return $this;
    }

    /**
     * @return array
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    /**
     * @param Brand $brand
     * @return Collection
     */
    public function addBrands(Brand $brand):Collection
    {
        $this->brands[$brand->getId()] = $brand;

        return $this;
    }

}