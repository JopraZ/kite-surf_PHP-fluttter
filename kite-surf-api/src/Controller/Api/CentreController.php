<?php

namespace App\Controller\Api;

use App\Repository\CentreRepository;
use App\Entity\Centre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/centre')]
class CentreController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(CentreRepository $centreRepository): JsonResponse
    {
        $centres = $centreRepository->findAll();

        $data = [];

        foreach ($centres as $centre) {
            $data[] = [
                'id' => $centre->getId(),
                'nom' => $centre->getNom(),
                'note' => $centre->getNote(),
                'description' => $centre->getDescription(),
                'site_web' => $centre->getSiteWeb(),
            ];
        }

        return new JsonResponse([
            'count' => count($data),
            'centres' => $data,
        ]);
    }
}
