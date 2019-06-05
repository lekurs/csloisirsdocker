<?php


namespace App\UI\Action\Interfaces;


use App\UI\Responder\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Response;

interface IndexActionInterface
{
    /**
     * @param IndexResponderInterface $responder
     * @return Response
     */
    public function __invoke(IndexResponderInterface $responder): Response;
}
