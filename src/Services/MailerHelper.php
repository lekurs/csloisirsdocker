<?php


namespace App\Services;


use App\Domain\DTO\Admin\Message\ReceiveNewContactDTO;
use App\Services\Interfaces\MailerHelperInterface;
use Twig\Environment;

class MailerHelper implements MailerHelperInterface
{
    private $swiftMailer;

    private $mailerAdminEmail;

    private $twig;

    /**
     * MailerHelper constructor.
     * @param $swiftMailer
     * @param $mailerAdminEmail
     * @param $twig
     */
    public function __construct(\Swift_Mailer $swiftMailer, string $mailerAdminEmail, Environment $twig)
    {
        $this->swiftMailer = $swiftMailer;
        $this->mailerAdminEmail = $mailerAdminEmail;
        $this->twig = $twig;
    }

    public function contactEnter(ReceiveNewContactDTO $contactDTO): void
    {
        $message = new \Swift_Message();

        $message
            ->setSubject('Vous avez reçu une nouvelle demande de renseignements de : ' . $contactDTO->name)
            ->setTo($this->mailerAdminEmail)
            ->setFrom($contactDTO->email)
            ->setBody($this->twig->render('Message/contact-enter.html.twig', [
                'informations' => $contactDTO
            ]));

        $this->swiftMailer->send($message);
    }
}