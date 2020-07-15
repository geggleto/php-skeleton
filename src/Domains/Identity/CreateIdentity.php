<?php


namespace Sans\Domains\Identity;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class CreateIdentity
{
    private string $uuid;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;

    public function __construct(UuidInterface $uuid, string $firstName, string $lastName, string $email, string $password)
    {
        $this->uuid = $uuid->toString();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT, [
            'cost' => 12
        ]);
    }

    public function toArray(): array {
        return [
            'uuid' => $this->uuid,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public static function fromArray(array $data): self {
        return new self(
            Uuid::fromString($data['uuid']),
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password']
        );
    }
}