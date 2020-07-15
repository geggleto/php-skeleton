<?php


namespace TestSans\Domains;

use Sans\Domains\Identity\HandlesCreateIdentity;
use TestSans\BaseTestCase;

class IdentityTest extends BaseTestCase
{
    public function testIdentityIsCreated() {
        $command = $this->createIdentity();
        $handler = $this->getObjectFromContainer(HandlesCreateIdentity::class);
        $output = $handler->handle($command);
        $this->assertTrue($output);
    }
}