<?php

namespace App\DataFixtures;

use App\Entity\Centre;
use App\DataFixtures\CentreFixtures;
use App\Entity\Demande;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DemandeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $demandes = [
            [
                'mail' => 'contact@exemple.fr',
                'nom' => 'Jean Dupont',
                'message' => 'Bonjour, je souhaiterais avoir plus d’informations sur les cours proposés et les disponibilités.',
                'centre' => 'centre_bretagne_kite_school'
            ],
            [
                'mail' => 'alice@test.com',
                'nom' => 'Alice Martin',
                'message' => 'Est-ce que vous proposez des stages pour débutants pendant l’été ?',
                'centre' => 'centre_wind_breizh_kite'
            ],
            [
                'mail' => 'paul@test.com',
                'nom' => 'Paul Bernard',
                'message' => 'Je cherche un stage de perfectionnement, pouvez-vous me donner plus de détails ?',
                'centre' => 'centre_atlantic_kite_center'
            ],
        ];

        foreach ($demandes as $data) {
            $demande = new Demande();
            $demande->setMail($data['mail']);
            $demande->setNom($data['nom']);
            $demande->setMessage($data['message']);
            $demande->setDate(new \DateTimeImmutable());
            $demande->setCentre($this->getReference($data['centre'],Centre::class));

            $manager->persist($demande);
        };

        $manager->flush();
    }

    public function getDependencies(): array
        {
            return [
                CentreFixtures::class,
            ];
        }
}
