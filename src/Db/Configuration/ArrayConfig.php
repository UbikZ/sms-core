<?php

namespace SMS\Core\Db\Configuration;

class ArrayConfig extends AbstractConfig implements IParameters
{
    /**
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        if (isset($this->getStorage()[$key])) {
            return $this->getStorage()[$key];
        }

        return $default;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->getStorage();
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->addStorageParam($value, $key);

        return $this;
    }
}
