<?php


namespace App\Domain\Factory;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Models\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserFactory implements UserFactoryInterface
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * UserFactory constructor.
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @param string $login
     * @param string $password
     * @param string $roles
     * @param string $email
     * @param string $slug
     * @return User
     * @throws \Exception
     */
    public function create(string $login, string $password, string $roles, string $email, string $slug): User
    {
        $encoder = $this->encoderFactory->getEncoder(User::class);

        return new User($login, $password, \Closure::fromCallable([$encoder, 'encodePassword']), $roles, $email, $slug);
    }
}