<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class ErrorController extends AbstractController
{
    public function show(): Response
    {
        return $this->render('error/error.html.twig');
    }
}
