<?php

namespace App\DataFixtures;

use App\Entity\Bar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $bar = new Bar();
            $bar->setNom($faker->word());
            $bar->setLatitude($faker->randomFloat($nbMaxDecimals = 8, $min = -9, $max = 90));
            $bar->setLongitude($faker->randomFloat($nbMaxDecimals = 8, $min = -9, $max = 90));
            $bar->setNomRue($faker->word());
            $bar->setNumRue($faker->randomDigit());
            $bar->setCodePostal("64600");
            $bar->setVille($faker->word());
            $bar->setTelephone($faker->word());
            
            $manager->persist($bar);
        }

        $manager->flush();
    }
}