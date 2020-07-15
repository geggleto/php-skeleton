<?php


namespace TestSans;


use Faker\Provider\Base;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Sans\BaseApp;
use Sans\Domains\Identity\CreateIdentity;

class BaseTestCase extends TestCase
{
    public static BaseApp $app;

    public function createIdentity(): CreateIdentity {
        $uuid = Uuid::uuid4();
        $faker = \Faker\Factory::create();

        return new CreateIdentity(
            $uuid,
            $faker->firstName,
            $faker->lastName,
            $faker->email,
            $faker->password
        );
    }

    public static function setUpBeforeClass(): void
    {
        self::$app = new BaseApp();
    }

    public function getObjectFromContainer(string $fqdn) {
        return self::$app->getContainer()->get($fqdn);
    }

    public function testEnvironment() {
        $this->assertEquals(APP_ENV, 'testing');
    }
}