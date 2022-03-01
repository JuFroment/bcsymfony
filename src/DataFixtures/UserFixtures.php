<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0; $i<201; $i++ ){
            $user = new User();
            $user->setNom($faker->lastName);
            $user->setPrenom($faker->firstName());
            $user->setCodePostal($faker->postcode());
            $user->setVille($faker->city());
            $user->setNumeroRue($faker->buildingNumber);
            $user->setRue($faker->streetAddress);
            $user->setEmail($faker->email);
            $user->setDateNaissance($faker->dateTime('now'));

            $manager->persist($user);
        }


        $manager->flush();
    }
}
