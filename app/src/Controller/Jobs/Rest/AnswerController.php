<?php
declare(strict_types=1);

namespace App\Controller\Jobs\Rest;

use App\Entity\Api\Jobs\NewAnswer;
use App\Repository\IJobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Throwable;

class AnswerController extends AbstractController
{
    #[Route('/api/job/answers', name: 'app_job_create_answer')]
    public function index(
        IJobRepository $jobRepository,
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
    ): Response
    {
        try {
            $newJobAnswer = $serializer->deserialize($request->getContent(), NewAnswer::class, 'json');
            $errors = $validator->validate($newJobAnswer);

            if (count($errors) > 0) {
                return new JsonResponse(['error' => (string) $errors], Response::HTTP_BAD_REQUEST);
            }

            $jobAnswer = $jobRepository->createJobAnswer($request->getContent());

            return new JsonResponse($jobAnswer);
        } catch (Throwable $t) {
            print_r($t->getMessage());
            return new JsonResponse(['error' => true], Response::HTTP_BAD_REQUEST);
        }
    }
}
