<?php

namespace Lpp\Service;

use Lpp\Config\Config;
/**
 * The implementation is responsible for resolving the id of the collection from the
 * given collection name.
 *
 * Second responsibility is to sort the returning result from the item service in whatever way. 
 * 
 * Please write in the case study's summary if you find this approach correct or not. In both cases explain why.
 *
 * Better way to set ItemService is use a dependency injection design pattern.
 *
 * !!!!!!!!!!!!!!!
 * Such architecture helps to prevent a situation in which you forget about setting the right one ItemService and make class easier to testing
 *!!!!!!!!!!!!!!!!
 */
interface BrandBetterServiceInterface
{
    /**
     * BrandBetterServiceInterface constructor.
     * @param ItemServiceInterface $ItemService
     * @param Config $config
     */
    public function __construct(ItemServiceInterface $ItemService, Config $config);

    /**
     * @param string $collectionName Name of a collection to search for
     *
     * @return \Lpp\Entity\Item[]
     */
    public function getItemsForCollection($collectionName);

}
