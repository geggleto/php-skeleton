<?php


namespace Sans\Infrastructure;


use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\TableGateway;

class GatewayFactory
{
    private Adapter $adapter;
    private array $tables = [
        'identities'
    ];

    /**
     * GatewayFactory constructor.
     *
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param string $table
     *
     * @return TableGateway
     * @throws \InvalidArgumentException
     */
    public function getTableGateway(string $table) : TableGateway {
        if (!in_array($table, $this->tables)) {
            throw new \InvalidArgumentException("Table does not exist");
        }

        return new TableGateway($table, $this->adapter);
    }
}