<?php

namespace SMS\Core\Db\Adapter;

use Doctrine\DBAL\Driver\PDOConnection;

/**
 * Class AbstractAdapter
 */
abstract class AbstractAdapter
{
    /**
     * @param $adapter
     * @param $host
     * @param $dbName
     * @param $port
     * @param $user
     * @param $password
     * @param array $options
     * @return PDOConnection
     */
    public function connect($adapter, $host, $dbName, $port, $user, $password, $options = [])
    {
        return new PDOConnection($this->generateDsn($adapter, $host, $dbName), $user, $password, $options);
    }

    /**
     * @param $adapter
     * @param $host
     * @param $dbName
     * @return string
     */
    protected function generateDsn($adapter, $host, $dbName)
    {
        return sprintf('%s:host=%s;dbname=%s', $adapter, $host, $dbName);
    }
}
