<?php

namespace App\Controller\Api;

use App\Repository\CentreRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/centre')]
class CentreController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(CentreRepository $centreRepository): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'centres' => $centreRepository->findAll(),
        ]);
    }
}
