<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtablissementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $etablissement = new Etablissement();
        $etablissement->setNom('Lycée Jean Moulin');
        $etablissement->setVille('Paris');
        $etablissement->setAdresse1('10 rue des écoles');
        $etablissement->setCodePostal(75001);
        $etablissement->setTelephone('0102030405');
        $etablissement->setEmail('contact@lycee-jean-moulin.fr');

        $manager->persist($etablissement);
        $manager->flush();
    }
}

