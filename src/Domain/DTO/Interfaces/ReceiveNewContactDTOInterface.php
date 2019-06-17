<?php


namespace App\Domain\DTO\Interfaces;


interface ReceiveNewContactDTOInterface
{
    /**
     * ReceiveNewContactDTOInterface constructor.
     *
     * @param string $name
     * @param string $lastName
     * @param string $phone
     * @param string $email
     * @param string $message
     * @param array $rpgd
     */
    public function __construct(
        string $name,
        string $lastName,
        string $phone,
        string $email,
        string $message,
        array $rpgd
    );
}
