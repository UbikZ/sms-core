<?php

namespace SMS\Core\Db;

use SMS\Core\Db\Configuration\IParameters;
use SMS\Core\Db\Adapter\AbstractAdapter;

/**
 * Class Connection
 * @package SMS\Core\Db
 */
class Connection
{
    /** @var IParameters  */
    protected $configuration;

    /**
     * @param IParameters $config
     */
    public function __construct(IParameters $config)
    {
        $this->configuration = $config;
    }

    /**
     * @return \Doctrine\DBAL\Driver\PDOConnection
     * @throws \SMS\Core\Exception\InvalidDatabaseAdapterException
     */
    public function connect()
    {
        $conf = $this->getConfiguration();
        /** @var AbstractAdapter $conn */
        $conn = StaticFactory::get($conf->get('adapter'));

        return $conn->connect(
            $conf->get('adapter'),
            $conf->get('host'),
            $conf->get('dbname'),
            $conf->get('port'),
            $conf->get('user'),
            $conf->get('password'),
            $conf->get('options')
        );
    }

    /**
     * @return IParameters
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param IParameters $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
    }
}
