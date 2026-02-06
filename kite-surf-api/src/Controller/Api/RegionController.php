<?php

namespace App\Controller\Api;

use App\Repository\RegionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class RegionController extends AbstractController
{
    #[Route('/api/region', methods:['GET'])]
    public function index(RegionRepository $regionRepository): JsonResponse
    {;
        $regions = $regionRepository->findAll();

        $data= [];
        foreach ($regions as $region) {
            $data[] = [
                'id' => $region->getId(),
                'nom' => $region->getNom(),
            ];
        }
        return new JsonResponse([
            'count' => count($data),
            'regions' => $data
        ]);
    }
}
