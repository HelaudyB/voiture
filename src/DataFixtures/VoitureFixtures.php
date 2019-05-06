<?php

namespace App\DataFixtures;

use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i =1; $i <=10; $i ++){
            $voiture = new Voiture();
            $voiture->setPuissance('puissance'.$i)
                    ->setNombreKm($i)
                    ->setMarque('Marque n°'.$i)
                    ->setImage('image n°'.$i);
            $manager->persist($voiture);

        }

        $manager->flush();
    }
}
