<?php


namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface CategoryPubShowResponderInterface
{
    /**
     * CategoryPubShowResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param Category $category
     * @return Response
     */
    public function response(Category $category): Response;
}
