<?php

namespace App\Controller\Jobs;

use App\Repository\IJobRepository;
use App\Service\IPaginatorService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends BaseController
{
    #[Route('/', name: 'app_jobs')]
    public function index(
        IJobRepository $jobRepository,
        IPaginatorService $paginatorService,
        Request $request,
    ): Response
    {
        $page = $request->query->getInt('page', 1);

        return $this->renderTemplate($paginatorService, $jobRepository, $page);
    }
}
