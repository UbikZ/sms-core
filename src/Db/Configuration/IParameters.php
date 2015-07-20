<?php

namespace SMS\Core\Db\Configuration;

/**
 * Interface IParameters
 * @package SMS\Core\Db\Configuration
 */
interface IParameters
{
    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);
}
