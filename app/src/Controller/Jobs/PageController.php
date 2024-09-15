<?php
declare(strict_types=1);

namespace App\Controller\Jobs;

use App\Repository\IJobRepository;
use App\Service\IPaginatorService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends BaseController
{
    #[Route('/jobs/page/{page}', name: 'app_jobs_page')]
    public function index(
        IJobRepository $jobRepository,
        IPaginatorService $paginatorService,
        Request $request,
    ): Response
    {
        $page = $request->attributes->getInt('page', 1);

        return $this->renderTemplate($paginatorService, $jobRepository, $page);
    }
}
