<?php


namespace App\UI\Action\Interfaces;


use App\UI\Responder\Interfaces\AdminResponderInterface;
use Symfony\Component\HttpFoundation\Response;

interface AdminActionInterface
{
    /**
     * @param AdminResponderInterface $responder
     * @return Response
     */
    public function __invoke(AdminResponderInterface $responder): Response;
}
