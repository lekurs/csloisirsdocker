<?php


namespace App\UI\Action\Admin;


use App\UI\Action\Interfaces\AdminActionInterface;
use App\UI\Responder\Interfaces\AdminResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminAction
 * @Route(name="admin", path="/admin")
 * @Security("has_role('ROLE_ADMIN')")
 * 
 */
class AdminAction implements AdminActionInterface
{
    public function __invoke(AdminResponderInterface $responder): Response
    {
        return $responder->response();
    }
}
