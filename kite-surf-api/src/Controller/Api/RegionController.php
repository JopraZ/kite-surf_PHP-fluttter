<?php

namespace App\Controller\Api;

use App\Repository\RegionRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class RegionController extends AbstractController
{
    #[Route('/api/region', name: 'app_api_region')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/RegionController.php',
        ]);
    }
}
