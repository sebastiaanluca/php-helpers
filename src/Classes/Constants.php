<?php

namespace SebastiaanLuca\PhpHelpers\Classes;

use ReflectionClass;

trait Constants
{
    /**
     * Get all the class constants.
     *
     * @return array
     */
    public static function constants() : array
    {
        return (new ReflectionClass(__CLASS__))->getConstants();
    }

    /**
     * Get all the names of the class constants.
     *
     * @return array
     */
    public static function keys() : array
    {
        return array_keys(static::constants());
    }

    /**
     * Get all the values of the class constants.
     *
     * @return array
     */
    public static function values() : array
    {
        return array_values(static::constants());
    }
}
