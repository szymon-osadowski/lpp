<?php
namespace Lpp\Entity;

use Lpp\Db\BaseEntity;
use Lpp\Validator\UrlValidator;


/**
 * Represents a single item from a search result.
 *
 * Class Item
 * @package Lpp\Entity
 */
class Item extends BaseEntity
{
    /**
     * Name of the item
     *
     * @var string
     */
    private $name;

    /**
     * Url of the item's page
     * 
     * @var string
     */
    private $url;

    /**
     * Unsorted list of prices received from the 
     * actual search query.
     * 
     * @var Price[]
     */
    private $prices = [];

    /**
     * @param string $name
     * @return Item
     */
    public function setName(string $name):Item
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $url
     * @return Item
     * @throws \Exception
     */
    public function setUrl(string $url):Item
    {
        $validator = new UrlValidator();
        if( $validator->validate($url))
        {
            $this->url = $url;
        }else{
            throw new \Exception('Url is invalid');
        }

        return $this;
    }

    /**
     * @param Price $price
     * @return Item
     */
    public function addPrices(Price $price):Item
    {
        $this->prices[$price->getId()] = $price;
        return $this;
    }

    /**
     * @return array
     */
    public function getPrices():array
    {
        return $this->prices;
    }

    /**
     * @param array $prices
     * @return Item
     */
    public function setPrices(array $prices):Item
    {
        $this->prices = $prices;
        return $this;
    }


}
