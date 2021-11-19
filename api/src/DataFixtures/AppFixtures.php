<?php

namespace App\DataFixtures;

use App\Entity\Bar;
use App\Entity\Consommable;
use App\Entity\Evenement;
use App\Entity\Photo;
use App\Entity\Gerant;
use App\Entity\Client;
use App\Entity\Salon;
use App\Entity\Message;
use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    // ini_set('memory_limit', '-1');
    $faker = Faker\Factory::create('fr_FR');

    $gerant = new Gerant();
    $gerant->setPrenom("Benoit");
    $gerant->setNom("Sakachyas");
    $gerant->setEmail("gerant@chopin.fr");
    $gerant->setPassword("$2a$12\$ETkEv86DNVqQOJB3sFwkhuvbW.k8VyL9XxeU3UJ2vUy/AukGLDLnW");
    $gerant->setRoles(["ROLE_USER"]);
    $gerant->setCheminPhoto($faker->word().".png");

    $client = new Client();
    $client->setPrenom("Gabin");
    $client->setNom("Gigachyas");
    $client->setEmail("client@chopin.fr");
    $client->setPassword("$2a$12\$ETkEv86DNVqQOJB3sFwkhuvbW.k8VyL9XxeU3UJ2vUy/AukGLDLnW");
    $client->setRoles(["ROLE_USER"]);
    $client->setCheminPhoto($faker->word().".png");

    $manager->persist($gerant);
    $manager->persist($client);


    for ($i = 0; $i < 10; $i++) {

      $bar = new Bar();
      $bar->setNom($faker->word());
      $bar->setLatitude($faker->randomFloat($nbMaxDecimals = 8, $min = -9, $max = 90));
      $bar->setLongitude($faker->randomFloat($nbMaxDecimals = 8, $min = -9, $max = 90));
      $bar->setNomRue($faker->word());
      $bar->setNumRue($faker->randomDigit());
      $bar->setCodePostal("33000");
      $bar->setVille($faker->word());
      $bar->setTelephone($faker->word());
      $bar->setGerant($gerant);

      for ($j=0; $j < 3; $j++) {
        $consommable = new Consommable();
        $consommable->setNom($faker->word());
        $consommable->setPrix($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99));
        $consommable->setQuantite($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100));

        $consommable->setBar($bar);
        $manager->persist($consommable);
      }

      for ($k=0; $k < 2; $k++) {
        $evenement = new Evenement();
        $evenement->setNom($faker->word());
        $evenement->setEtat($faker->boolean());
        $evenement->setType($faker->word());
        $evenement->setHeureDebut($faker->dateTime($max = 'now', $timezone = null));
        $evenement->setHeureFin($faker->dateTime($max = 'now', $timezone = null));

        $evenement->setBar($bar);
        $manager->persist($evenement);
      }

      for ($l=0; $l < 2; $l++) {
        $photo = new Photo();
        $photo->setCheminPhoto($faker->word().".png");
        $photo->setDescription($faker->word());

        $photo->setBar($bar);
        $manager->persist($photo);
      }

      $salon = new Salon();
      $salon->setBar($bar);
      $salon->addClient($client);
      $bar->setSalon($salon);

      for ($m=0; $m < 10; $m++) {
        $message = new Message();
        $message->setContenu($faker->word());
        $message->setCreatedAt(new \DateTimeImmutable('now'));
        $message->setSalon($salon);

        $manager->persist($message);
      }

      $manager->persist($salon);

      for ($n=0; $n < 2; $n++) {
        $avis = new Avis();
        $avis->setNote($faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5));
        $avis->setCommentaire($faker->word());
        $avis->setBar($bar);
        $avis->setClient($client);

        $manager->persist($avis);
      }

      $manager->persist($bar);
    }

    $manager->flush();
  }
}
