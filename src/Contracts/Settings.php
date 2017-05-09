<?php

namespace Finagin\Settings\Contracts;

interface Settings
{
    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    public static function get(String $key, $default = null);

    /**
     * @param string $key
     * @param $value
     *
     * @return void
     */
    public static function set(String $key, $value = null);

    /**
     * @param string $key
     *
     * @return void
     */
    public static function unset(String $key);
}
