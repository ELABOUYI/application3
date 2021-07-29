<?php

namespace App\DataFixtures;

use App\Entity\Aliments;
//use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $a1 = new Aliments();
        $a1 -> setNom('Carotte')
            -> setPrix(1.8)
            -> setImage('aliments/carotte.png')
            -> setCalorie(36)
            -> setProteine(0.77)
            -> setGlucide(6.45)
            -> setLipide(0.26)
            ;
        $manager->persist($a1);

        $a2 = new Aliments();
        $a2 -> setNom('Patate')
            -> setPrix(1.5)
            -> setImage('aliments/patate.jpg')
            -> setCalorie(80)
            -> setProteine(1.8)
            -> setGlucide(16,7)
            -> setLipide(0.34)
            ;
        $manager->persist($a2);

        $a3 = new Aliments();
        $a3 -> setNom('Tomate')
            -> setPrix(2.3)
            -> setImage('aliments/tomate.png')
            -> setCalorie(18)
            -> setProteine(0.8)
            -> setGlucide(2.26)
            -> setLipide(0.24)
            ;
        $manager->persist($a3);

        $a4 = new Aliments();
        $a4 -> setNom('Pomme')
            -> setPrix(2.35)
            -> setImage('aliments/pomme.png')
            -> setCalorie(52)
            -> setProteine(0.25)
            -> setGlucide(11,6)
            -> setLipide(0.25)
            ;
        $manager->persist($a4);

        $manager->flush();
    }
}
