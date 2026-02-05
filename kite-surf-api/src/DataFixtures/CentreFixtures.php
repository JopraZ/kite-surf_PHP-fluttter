<?php

namespace App\DataFixtures;

use App\DataFixtures\RegionFixtures;
use App\Entity\Centre;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CentreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $centre = [
            [
                'nom' => 'Bretagne Kite School',
                'note' => 4.5,
                'description' => 'Bretagne Kite School est un club reconnu pour la qualité de son enseignement et son approche pédagogique. Il propose des cours de kitesurf pour débutants comme pour riders confirmés, dans un cadre sécurisé et convivial.',
                'region' => 'bretagne',
                'site' => 'https://www.bretagnekite.fr'
            ],
            [
                'nom' => 'Wind Breizh Kite',
                'note' => 4.2,
                'description' => 'Wind Breizh Kite est une école dynamique spécialisée dans le kitesurf freestyle et la progression technique. L’équipe encadre les pratiquants avec du matériel récent et adapté à tous les niveaux.',
                'region' => 'bretagne',
                'site' => 'https://www.windbreizhkite.com'
            ],
            [
                'nom' => 'Armor Kite Club',
                'note' => 4.8,
                'description' => 'Armor Kite Club propose des stages intensifs et des cours personnalisés tout au long de l’année. Le club met l’accent sur la sécurité, la maîtrise du vent et le plaisir de la glisse.',
                'region' => 'bretagne',
                'site' => 'https://www.armorkiteclub.fr'
            ],
            [
                'nom' => 'Mediterraneo Kite',
                'note' => 4.6,
                'description' => 'Mediterraneo Kite bénéficie de conditions météo idéales pour pratiquer le kitesurf toute l’année. Le club accompagne les pratiquants dans leur progression, du niveau débutant jusqu’à l’autonomie complète.',
                'region' => 'occitanie',
                'site' => 'https://www.mediterraneokite.fr'
            ],
            [
                'nom' => 'Blue Wind Kite',
                'note' => 4.3,
                'description' => 'Blue Wind Kite est un club moderne proposant des cours encadrés par des moniteurs certifiés. Il met à disposition du matériel récent et organise régulièrement des stages de perfectionnement.',
                'region' => 'occitanie',
                'site' => 'https://www.bluewindkite.com'
            ],
            [
                'nom' => 'Sunset Kite School',
                'note' => 4.7,
                'description' => 'Sunset Kite School est une école réputée pour son accompagnement personnalisé et son ambiance conviviale. Les cours sont adaptés au rythme de chaque pratiquant afin de garantir une progression en toute sécurité.',
                'region' => 'occitanie',
                'site' => 'https://www.sunsetkite.fr'
            ],
            [
                'nom' => 'Atlantic Kite Center',
                'note' => 4.9,
                'description' => 'Atlantic Kite Center est un centre haut de gamme situé face à l’océan Atlantique. Il propose des cours, des stages et des sessions encadrées pour tous les niveaux, avec une forte exigence de qualité.',
                'region' => 'paca',
                'site' => 'https://www.atlantickitecenter.fr'
            ],
            [
                'nom' => 'Ocean Wind Kite',
                'note' => 4.4,
                'description' => 'Ocean Wind Kite est un club local axé sur la progression technique et la sécurité des pratiquants. Il accueille aussi bien les débutants que les riders souhaitant se perfectionner.',
                'region' => 'paca',
                'site' => 'https://www.oceanwindkite.com'
            ],
            [
                'nom' => 'Basque Kite School',
                'note' => 4.6,
                'description' => 'Basque Kite School est une école emblématique de la côte basque. Elle propose des cours de kitesurf encadrés par des professionnels passionnés, dans un esprit sportif et convivial.',
                'region' => 'paca',
                'site' => 'https://www.basquekite.fr'
            ],
        ];

        foreach ($centre as $data) {
            $centre = new Centre();
            $centre->setNom($data['nom']);
            $centre->setNote($data['note']);
            $centre->setDescription($data['description']);
            $centre->setSiteWeb($data['site']);
            $centre->setRegion(
                $this->getReference('region_' . $data['region'], \App\Entity\Region::class)
            );

            $manager->persist($centre);

            $this->addReference(
            'centre_' . strtolower(str_replace(' ', '_', $data['nom'])),
            $centre);

            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            RegionFixtures::class,
        ];
    }
}
