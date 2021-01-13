<?php


namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * @var Uuid
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $roles;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $slug;

    /**
     * User constructor.
     *
     * @param string $username
     * @param string $password
     * @param callable $encoder
     * @param string $roles
     * @param string $email
     * @param string $slug
     * @throws \Exception
     */
    public function __construct(
        string $username,
        string $password,
        callable $encoder,
        string $roles,
        string $email,
        string $slug
    ) {
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->password = $password;
        $this->password = $encoder($password, null);
        $this->roles[] = $roles;
        $this->email = $email;
        $this->slug = $slug;
    }

    /**
     * @return Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getSalt()
    {
        return null;
    }
}
