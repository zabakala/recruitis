<?php
declare(strict_types=1);

namespace App\Controller\Jobs;

use App\Repository\IJobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DetailController extends AbstractController
{
    #[Route('/job/{id}/{seo}', name: 'app_job')]
    public function index(
        IJobRepository $jobRepository,
        Request $request,
    ): Response
    {
        $id = (int) $request->attributes->get('id');
        $job = $jobRepository->getJob($id);

        return $this->render(
            'job/index.html.twig',
            [
                'job' => $job->payload,
            ]
        );
    }
}
