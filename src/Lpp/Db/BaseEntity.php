<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 19:31
 */

namespace Lpp\Db;

abstract class BaseEntity
{
    /**
     * Id
     *
     * @var integer
     */
    private $id;

    /**
     * @param array $array
     * @param array $methodClass
     * @throws \ReflectionException
     */
    public function setPropertiesFromArray(array $array,array $methodClass)
    {
        foreach($methodClass as $key => $value)
        {
            $fieldName = $array[$key];
            if(is_array($fieldName)){
                foreach($fieldName as $nestedObjectKey => $nestedObjectArray)
                {
                    $entityMapper = new EntityMapper($nestedObjectArray, $nestedObjectKey, ucfirst(substr($key,0,-1)) );
                    $nestedObject = $entityMapper->execute();
                    $methodName = 'add' . ucfirst($key);
                    call_user_func([$this, $methodName], $nestedObject);
                }
            }else {
                call_user_func([$this, $value], $array[$key]);
            }
        }
    }

    /**
     * Get Id
     *
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

}