<?php

namespace Lpp\Entity;

use Lpp\Db\BaseEntity;

/**
 *
 * Represents a single price from a search result
 * related to a single item.
 * Class Price
 * @package Lpp\Entity
 */
class Price extends BaseEntity
{
    /**
     * Description text for the price
     * 
     * @var string
     */
    private $description;

    /**
     * Price in euro
     * 
     * @var int
     */
    private $priceInEuro;

    /**
     * Warehouse's arrival date (to)
     *
     * @var \DateTime
     */
    private $arrivalDate;

    /**
     * Due to date,
     * defining how long will the item be available for sale (i.e. in a collection)
     *
     * @var \DateTime
     */
    private $dueDate;

    /**
     * @param string $description
     * @return Price
     */
    public function setDescription(string $description):Price
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
     * @param int $priceInEur
     * @return Price
     */
    public function setPriceInEuro(int $priceInEur):Price
    {
        $this->priceInEuro = $priceInEur*100;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriceInEuro():int
    {
        return $this->priceInEuro/100;
    }

    /**
     * @param \DateTime $arrivalDate
     * @return Price
     */
    public function setArrivalDate(\DateTime $arrivalDate):Price
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getArrivalDate():\DateTime
    {
        return $this->arrivalDate;
    }

    /**
     * @param \DateTime $dueDate
     * @return Price
     */
    public function setDueDate(\DateTime $dueDate):Price
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }
}
