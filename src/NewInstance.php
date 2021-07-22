<?php

namespace Mehedi\NewInstance;

trait NewInstance
{
    protected static $instance;

    /**
     * New Instance
     *
     * @return static
     */
    public static function newInstance()
    {
        return new static(...func_get_args());
    }

    /**
     * Create singletone
     *
     * @return static
     */
    public static function newSingleInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = static::newInstance(...func_get_args());
        }

        return static::$instance;
    }

    /**
     * Clear static instance
     */
    public static function clearSingleInstance()
    {
        static::$instance = null;
    }
}
