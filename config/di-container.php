<?php

use Laminas\Db\Adapter\Adapter;
use Psr\Container\ContainerInterface;
use Sans\Domains\Identity\HandlesCreateIdentity;

return [
    Adapter::class => function (ContainerInterface $container) {
        $APP_ENV = APP_ENV;
        return new Laminas\Db\Adapter\Adapter([
            'driver'   => 'Pdo_Sqlite',
            'database' => APP_ROOT . "/db/{$APP_ENV}_db.sqlite3",
        ]);
    },
    HandlesCreateIdentity::class => function (ContainerInterface $container) {
        return new HandlesCreateIdentity(
            new Laminas\Db\TableGateway\TableGateway('identities', $container->get(Adapter::class))
        );
    }
];
