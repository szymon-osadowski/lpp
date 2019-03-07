<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 19:49
 */

namespace Lpp\Service;

/**
 * Class DateTimeService
 * @package Lpp\Service
 */
class DateTimeService
{

    /**
     * @param \DateTime $dateTime
     * @return string
     */
    public function prepareToSave(\DateTime $dateTime):string
    {
        return $dateTime->format('Y-m-d');
    }

    /**
     * @param string $dateTime
     * @return \DateTime
     */
    public function prepareToRead(string $dateTime):\DateTime
    {
        return new \DateTime($dateTime);
    }

}