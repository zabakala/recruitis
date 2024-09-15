<?php
declare(strict_types=1);

namespace App\Controller\Jobs;

use App\Repository\IJobRepository;
use App\Service\IPaginatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController
{
    protected function renderTemplate(
        IPaginatorService $paginatorService,
        IJobRepository $jobRepository,
        int $page,
    ): Response
    {
        $result = $jobRepository->getJobs($page, IPaginatorService::PAGE_LIMIT);
        $paginator = $paginatorService->paginate($result->payload, $result->meta);

        return $this->render(
            'jobs/index.html.twig',
            [
                'paginator' => $paginator,
            ]
        );
    }
}
