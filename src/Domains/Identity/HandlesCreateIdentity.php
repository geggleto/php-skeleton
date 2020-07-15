<?php


namespace Sans\Domains\Identity;


use Laminas\Db\TableGateway\TableGateway;
use Sans\Infrastructure\GatewayFactory;

class HandlesCreateIdentity
{
    /**
     * @var TableGateway
     */
    private TableGateway $gateway;

    /**
     * HandlesCreateIdentity constructor.
     * @param TableGateway $gateway
     */
    public function __construct(TableGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function handle(CreateIdentity $identity): bool {
        try {
            $this->gateway->insert($identity->toArray());
            return true;
        } catch (\Exception $exception) {
            var_dump($exception);
            return false;
        }
    }
}