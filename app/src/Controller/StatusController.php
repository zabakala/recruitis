<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class StatusController extends AbstractController
{
    #[Route('/status', name: 'app_status')]
    public function index(): JsonResponse
    {
        return $this->json([
            'ping' => time(),
            'path' => 'src/Controller/StatusController.php',
        ]);
    }
}
