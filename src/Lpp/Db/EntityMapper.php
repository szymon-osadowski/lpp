<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 20:06
 */

namespace Lpp\Db;

/**
 * Class EntityMapper
 * @package Lpp\Db
 */
class EntityMapper
{
    /**
     * Mapped array
     * @var array
     */
    private $array = [];

    /**
     * Mapped class name
     * @var string
     */
    private $className;

    /**
     * EntityMapper constructor.
     * @param array $array
     * @param int $objectId
     * @param string $className
     */
    public function __construct(array $array, int $objectId, string $className)
    {
        if(!key_exists('id', $array))
        {
            $array['id'] = $objectId;
        }
        $this->array = $array;
        $this->className = 'Lpp\Entity\\' .$className;
    }

    /**
     * @return object
     * @throws \ReflectionException
     */
    private function prepareObject():object
    {
        $reflectionClass = new \ReflectionClass($this->className);
        $methodArray= [];
        foreach($this->array as $key => $value)
        {
            $methodName = 'set' . ucfirst($key);
            if($reflectionClass->hasMethod($methodName))
            {
                $methodArray[$key] = $methodName;
            }
        }
        $object = $reflectionClass->newInstance();
        $object->setPropertiesFromArray($this->array, $methodArray);
        return $object;
    }

    /**
     * @return object
     * @throws \ReflectionException
     */
    public function execute():object
    {
        return $this->prepareObject();
    }

}