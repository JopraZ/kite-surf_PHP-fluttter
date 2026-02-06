<?php

namespace App\Controller\Api;

use App\Repository\DemandeRepository;
use App\Repository\CentreRepository;
use App\Entity\Demande;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/demande')]
class DemandeController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(DemandeRepository $demandeRepository): JsonResponse
    {
        $demandes = $demandeRepository->findAll();

        $data = [];

        foreach ($demandes as $demand) {
            $data[] = [
                'id' => $demand->getId(),
                'mail' => $demand->getMail(),
                'nom' => $demand->getNom(),
                'message' => $demand->getMessage(),
                'date' => $demand->getDate()->format('Y-m-d H:i:s'),
                'centre' => [
                    'id' => $demand->getCentre()->getId(),
                    'nom' => $demand->getCentre()->getNom(),
                ],
            ];
        }

        return $this->json([
            'count' => count($data),
            'demandes' => $data,
        ]);
    }

    #[Route('', methods: ['POST'])]
    public function create (
        Request $request,
        EntityManagerInterface $entityManager,
        CentreRepository $centreRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return $this->json(['error' => 'Invalid JSON'], 400);
        }

        if (
            empty($data['mail']) ||
            empty($data['nom']) ||
            empty($data['message']) ||
            empty($data['centre_id'])
        ) {
            return $this->json(['error'=> 'Veillez remplir tous les champs'], 400);
        }

        $centre = $centreRepository->find($data['centre_id']);

        if (!$centre) {
            return $this->json(['error' => 'Centre invalide'], 404);
        }

        $demande = new Demande();
        $demande->setMail($data['mail']);
        $demande->setNom($data['nom']);
        $demande->setMessage($data['message']);
        $demande->setDate(new \DateTimeImmutable());
        $demande->setCentre($centre);

        $entityManager->persist($demande);
        $entityManager->flush();

        return $this->json([
            'message' => 'Demande créée avec succès',
            'demande_id' => $demande->getId(),
        ], 201);
    }
}
