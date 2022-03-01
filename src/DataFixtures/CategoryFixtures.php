<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setLabel("Chien");
        $this->addReference('Chien', $category1);

        $category2 = new Category();
        $category2->setLabel("Chat");
        $this->addReference('Chat', $category2);

        $category3 = new Category();
        $category3->setLabel("Reptile");
        $this->addReference('Reptile', $category3);

        $category4 = new Category();
        $category4->setLabel('Alimentation');
        $category4->setParentId($category2);
        $this->addReference('AlimentationChat', $category4);

        $category5 = new Category();
        $category5->setLabel('Alimentation');
        $category5->setParentId($category1);
        $this->addReference('AlimentationChien', $category5);

        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($category5);

        $manager->flush();

        $manager->flush();
    }
}
