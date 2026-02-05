<?php

namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RegionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $regions = ['Bretagne', 'Occitanie', 'PACA'];

        foreach ($regions as $name) {
            $region = new Region();
            $region->setNom($name);

            $manager->persist($region);
            $this->addReference('region_' . strtolower($name), $region);
        }

        $manager->flush();
    }
}
