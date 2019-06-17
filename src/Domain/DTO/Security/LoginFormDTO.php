<?php


namespace App\Domain\DTO\Security;


use App\Domain\DTO\Interfaces\LoginFormDTOInterface;

final class LoginFormDTO implements LoginFormDTOInterface
{
    public $username;

    public $password;

    /**
     * LoginFormDTO constructor.
     *
     * @inheritDoc
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}
