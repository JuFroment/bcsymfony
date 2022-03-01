<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $product1 = new Product();
        $product1->setName('Produit de oufbatar1');
        $product1->setDescription('Logoden biniou degemer mat an penn ar bed c’hwec’h, baradoz ha troc’hañ e Ar Gall hennezh c’houzoug estreget  kentel, se heol ziskouez degouezhout dont hag C’hall. Dro dirak fiziañs pennad c’hleuz ar kastell stivell tregont, tad pignat fraoñval tiegezh Krouer ar banniel dirak  bro, pod tregas serret Aradon alies Ar Releg-Kerhuon muiañ. Anzav vihan tachenn kilhog Aradon brudet saveteiñ netra Santeg, sec’hed al Skos aon c’helec’h ar bier pegañ rev, tan ar klask evitañ hevelep Lanuon prenañ. ');
        $product1->setImage('verynoise.png');
        $product1->setPrice(10.99);
        $product1->setCategory($this->getReference("AlimentationChien"));
        $product1->setRating(5);

        $product2 = new Product();
        $product2->setName('Produit de oufbatar2');
        $product2->setDescription('Disadorn enno skuizhañ hon a deñvalijenn Pask devezh evel, honnont leziregezh estreget  gallek ifern Arre digalon lezenn piler, ur unnek urzh da poazh dan ezel. Harp doug tra pelec’h ur etrezek ostaleri ar boutañ, amanenn kroaz lost o netra logoden a livañ rak , a mignon gomz Pempont geniterv gouriz dan. E roud evidon kreiz kerzhout Plelann-Vihan c’hontrol gozh ur, eizh louet keloù bandenn arar wenodenn gwerenn patatez Ar Vouster, loen moged bez dezho Plegad-Gwerann Lanuon gwechall.');
        $product2->setImage('flippedverynoise.png');
        $product2->setPrice(15.99);
        $product2->setCategory($this->getReference("AlimentationChat"));
        $product2->setRating(5);

        $product3 = new Product();
        $product3->setName('Produit de oufbatar3');
        $product3->setDescription('Logoden biniou degemer mat an penn ar bed c’hwec’h, baradoz ha troc’hañ e Ar Gall hennezh c’houzoug estreget  kentel, se heol ziskouez degouezhout dont hag C’hall. Dro dirak fiziañs pennad c’hleuz ar kastell stivell tregont, tad pignat fraoñval tiegezh Krouer ar banniel dirak  bro, pod tregas serret Aradon alies Ar Releg-Kerhuon muiañ. Anzav vihan tachenn kilhog Aradon brudet saveteiñ netra Santeg, sec’hed al Skos aon c’helec’h ar bier pegañ rev, tan ar klask evitañ hevelep Lanuon prenañ. ');
        $product3->setImage('verynoise.png');
        $product3->setPrice(12.99);
        $product3->setCategory($this->getReference("AlimentationChien"));
        $product3->setRating(3);

        $product4 = new Product();
        $product4->setName('Produit de oufbatar4');
        $product4->setDescription('Disadorn enno skuizhañ hon a deñvalijenn Pask devezh evel, honnont leziregezh estreget  gallek ifern Arre digalon lezenn piler, ur unnek urzh da poazh dan ezel. Harp doug tra pelec’h ur etrezek ostaleri ar boutañ, amanenn kroaz lost o netra logoden a livañ rak , a mignon gomz Pempont geniterv gouriz dan. E roud evidon kreiz kerzhout Plelann-Vihan c’hontrol gozh ur, eizh louet keloù bandenn arar wenodenn gwerenn patatez Ar Vouster, loen moged bez dezho Plegad-Gwerann Lanuon gwechall.');
        $product4->setImage('flippedverynoise.png');
        $product4->setPrice(5.99);
        $product4->setCategory($this->getReference("AlimentationChat"));
        $product4->setRating(4);

        $product5 = new Product();
        $product5->setName('Produit de oufbatar5');
        $product5->setDescription('Logoden biniou degemer mat an penn ar bed c’hwec’h, baradoz ha troc’hañ e Ar Gall hennezh c’houzoug estreget  kentel, se heol ziskouez degouezhout dont hag C’hall. Dro dirak fiziañs pennad c’hleuz ar kastell stivell tregont, tad pignat fraoñval tiegezh Krouer ar banniel dirak  bro, pod tregas serret Aradon alies Ar Releg-Kerhuon muiañ. Anzav vihan tachenn kilhog Aradon brudet saveteiñ netra Santeg, sec’hed al Skos aon c’helec’h ar bier pegañ rev, tan ar klask evitañ hevelep Lanuon prenañ. ');
        $product5->setImage('verynoise.png');
        $product5->setPrice(22.99);
        $product5->setCategory($this->getReference("AlimentationChien"));
        $product5->setRating(2);

        $product6 = new Product();
        $product6->setName('Produit de oufbatar6');
        $product6->setDescription('Disadorn enno skuizhañ hon a deñvalijenn Pask devezh evel, honnont leziregezh estreget  gallek ifern Arre digalon lezenn piler, ur unnek urzh da poazh dan ezel. Harp doug tra pelec’h ur etrezek ostaleri ar boutañ, amanenn kroaz lost o netra logoden a livañ rak , a mignon gomz Pempont geniterv gouriz dan. E roud evidon kreiz kerzhout Plelann-Vihan c’hontrol gozh ur, eizh louet keloù bandenn arar wenodenn gwerenn patatez Ar Vouster, loen moged bez dezho Plegad-Gwerann Lanuon gwechall.');
        $product6->setImage('flippedverynoise.png');
        $product6->setPrice(12);
        $product6->setCategory($this->getReference("AlimentationChat"));
        $product6->setRating(4);

        $manager->persist($product1);
        $manager->persist($product2);
        $manager->persist($product3);
        $manager->persist($product4);
        $manager->persist($product5);
        $manager->persist($product6);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }

}
