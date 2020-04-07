<?php

namespace App\DataFixtures;

use App\Entity\CallForProjects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CallForProjectsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $callForProjects = new CallForProjects();

        $callForProjects->setLabel('Voyage en espagne');

        $manager->persist($callForProjects);

        $manager->flush();
    }
}
