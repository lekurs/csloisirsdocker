<?php


namespace App\Domain\DTO\Admin\Message;


use App\Domain\DTO\Interfaces\ReceiveNewContactDTOInterface;

final class ReceiveNewContactDTO implements ReceiveNewContactDTOInterface
{
    public $name;

    public $lastName;

    public $phone;

    public $email;

    public $message;

    public $rgpd;

    /**
     * ReceiveNewContactDTO constructor.
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
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
        $this->rpgd = $rpgd;
    }
}
