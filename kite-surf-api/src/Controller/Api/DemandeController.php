<?php

namespace App\Controller\Api;

use App\Repository\DemandeRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class DemandeController extends AbstractController
{
    #[Route('/api/demande', name: 'app_api_demande')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
        ]);
    }
}
