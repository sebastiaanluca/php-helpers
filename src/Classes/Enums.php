<?php

namespace SebastiaanLuca\PhpHelpers\Classes;

use ReflectionClass;

trait Enums
{
    /**
     * Get all the class constants.
     *
     * @return array
     */
    public static function enums() : array
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
        return array_keys(static::enums());
    }

    /**
     * Get all the values of the class constants.
     *
     * @return array
     */
    public static function values() : array
    {
        return array_values(static::enums());
    }
}
