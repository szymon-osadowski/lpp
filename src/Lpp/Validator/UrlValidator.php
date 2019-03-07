<?php
/**
 * Created by PhpStorm.
 * User: Szymon
 * Date: 25.10.2018
 * Time: 23:16
 */

namespace Lpp\Validator;

/**
 * Class UrlValidator
 * @package Lpp\Validator
 */
class UrlValidator
{
    /**
     * @param string $url
     * @return bool
     */
    public function validate(string $url):bool
    {
        /*
         * If url is full url
         */
        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;

        /*
         * If url is just a slug
         *
         * return filter_var($url, FILTER_FLAG_QUERY_REQUIRED ) ? true : false;
         */
    }
}