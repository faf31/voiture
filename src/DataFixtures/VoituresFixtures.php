<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Voitures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VoituresFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $marque = new Marque();
        $marque->setLibelle('toyota');
        $manager->persist($marque);

        $marque1 = new Marque();
        $marque1->setLibelle('porshe');
        $manager->persist($marque1);

        $marque2 = new Marque();
        $marque2->setLibelle('renault');
        $manager->persist($marque2);

        $model=new Modele();
        $model->setLibelle('rais')
        ->setPrixMoyen(15000)
        ->setImage('modele1.jpg')
        ->setMarque($marque);
        $manager->persist($model);

        $model1=new Modele();
        $model1->setLibelle('toto')
        ->setPrixMoyen(16000)
        ->setImage('modele2.jpg')
        ->setMarque($marque2);
        $manager->persist($model1);

        $model2=new Modele();
        $model2->setLibelle('tutu')
        ->setPrixMoyen(17000)
        ->setImage('modele3.jpg')
        ->setMarque($marque1);
        $manager->persist($model2);

        $model3=new Modele();
        $model3->setLibelle('luu')
        ->setPrixMoyen(18000)
        ->setImage('modele3.jpg')
        ->setMarque($marque1);
        $manager->persist($model3);

        $modeles=[$model,$model1,$model2,$model3];
$faker=\Faker\Factory::create('fr_FR');
foreach($modeles as $m){
    $rand=rand(3,5);
    for($i=1;$i<=$rand;$i++){
        $voiture =new Voitures;
        $voiture->setImmatriculation($faker->regexify("[A-Z]{2}[0-9]{4}[A-Z]{2}"))
        ->setNbPortes($faker->randomElement($array=array(3,5)))
        ->setAnnee($faker->numberBetween($min=1990,$max=2019))
        ->setModele($m);
        $manager->persist($voiture);


    }
}
        $manager->flush();
    }
}
