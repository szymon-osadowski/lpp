<?php

namespace Lpp\Entity;

use Lpp\Db\BaseEntity;


/**
 * Represents a single brand in the result.
 * Class Brand
 * @package Lpp\Entity
 */
class Brand extends BaseEntity
{

    /**
     * Name of the brand
     *
     * @var string
     */
    private $brand;

    /**
     * Brand's description
     * 
     * @var string
     */
    private $description;

    /**
     * Unsorted list of items with their corresponding prices.
     * 
     * @var Item[]
     */
    private $items = [];

    private $name;

    /**
     * @param string $brand
     * @return Brand
     */
    public function setBrand(string $brand):Brand
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $description
     * @return Brand
     */
    public function setDescription(string $description):Brand
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * @param Item $item
     * @return Brand
     */
    public function addItems(Item $item):Brand
    {
        $this->items[$item->getId()] = $item;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems():array
    {
        return $this->items;
    }

    /**
     * @param Item $item
     * @return Brand
     */
    public function removeItem(Item $item):Brand
    {
        unset($this->items[$item->getId()]);

        return $this;
    }

    /**
     * @param array $items
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param string $name
     * @return Brand
     */
    public function setName(string $name):Brand
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return$this->name;
    }
}
