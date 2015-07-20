<?php

namespace SMS\Core\Db\Adapter;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Driver\PDOConnection;
use Doctrine\DBAL\DriverManager;

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
     * @param array $params
     * @return \Doctrine\DBAL\Connection
     * @throws \Doctrine\DBAL\DBALException
     */
    public function dbalConnect(array $params)
    {
        return DriverManager::getConnection($params, new Configuration());
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
