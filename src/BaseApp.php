<?php


namespace Sans;


use DI\Bridge\Slim\App;
use DI\ContainerBuilder;

class BaseApp extends App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions(__DIR__ . '/../config/di-container.php');
    }
}